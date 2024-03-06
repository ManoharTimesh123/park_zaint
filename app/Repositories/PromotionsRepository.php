<?php

namespace App\Repositories;

use App\Interfaces\PromotionsRepositoryInterface;
use App\Models\Addons;
use App\Models\EmailRestricted;
use App\Models\Products;
use App\Models\PromotionProductAndAddon;
use App\Models\Promotions;
use Carbon\Carbon;
use Stripe\StripeClient;

class PromotionsRepository implements PromotionsRepositoryInterface
{
    private $stripe;
    private $currentTimestamp;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('app.stripe_secret'));
        $this->currentTimestamp = Carbon::now();
    }

    /**
     * This function retrieves an admin promotions by their ID.
     *
     * @param int promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to retrieve from the database.
     *
     * @return A promotions with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getPromotionById(int $promotionsId)
    {
        return Promotions::find($promotionsId);
    }

    /**
     * This function retrieves an admin promotions by their ID.
     *
     * @param int promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to retrieve from the database.
     *
     * @return A promotions with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAllAddonsAndProducts()
    {
        $products = Products::where('status', 1)
        ->whereNull('deleted_at')
        ->get(['id', 'strip_product_id', 'name']);

        $addons = Addons::where('status', 1)
        ->whereNull('deleted_at')
        ->get(['id', 'strip_product_id', 'name']);

        return ['products' => $products, 'addons' => $addons];
    }

    /**
     * This function retrieves an admin promotions by their ID.
     *
     * @param int promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to retrieve from the database.
     *
     * @return A promotions with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAllPromotionsAddonsAndProducts(int $promotionsId)
    {
        $products = PromotionProductAndAddon::with('promotions', 'products')
            ->where('promotion_id', '=', $promotionsId)
            ->where('is_exclude', '=', 0)
            ->where('product_id', '!=', null)
            ->get();

        $addons = PromotionProductAndAddon::with('promotions', 'addons')
            ->where('promotion_id', '=', $promotionsId)
            ->where('is_exclude', '=', 0)
            ->where('addons_id', '!=', null)
            ->get();

        return compact('products', 'addons');
    }

    /**
     * This function retrieves an admin promotions by their ID.
     *
     * @param int promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to retrieve from the database.
     *
     * @return A promotions with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAllExcludePromotionsAddonsAndProducts(int $promotionsId)
    {
        $products = PromotionProductAndAddon::with('promotions', 'products')
            ->where('is_exclude', '=', 1)
            ->where('promotion_id', '=', $promotionsId)
            ->where('product_id', '!=', null)
            ->get();

        $addons = PromotionProductAndAddon::with('promotions', 'addons')
        ->where('is_exclude', '=', 1)
        ->where('promotion_id', '=', $promotionsId)
        ->where('addons_id', '!=', null)
        ->get();

        return compact('products', 'addons');
    }

    /**
     * This function retrieves an admin promotions by their ID.
     *
     * @param int promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to retrieve from the database.
     *
     * @return A promotions with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAllEmails(int $promotionsId)
    {
        $emails = EmailRestricted::where('promotion_id', $promotionsId)
        ->whereNull('deleted_at')
        ->get(['email']);

        return compact('emails');
    }

    /**
     * This function creates an admin promotions.
     *
     * @param array $promotionsDetails The parameter `promotionsDetails` is an array that contains the details of
     * the admin promotions that we want to create.
     *
     * @return The created promotions is being returned.
     */
    public function createPromotion(array $promotionsDetails)
    {
        $coupon_object = [
            'redeem_by' => strtotime($promotionsDetails['expire']),
        ];

        if (isset($promotionsDetails['products_and_addons']) && $promotionsDetails['products_and_addons']) {
            $coupon_object['applies_to'] = ['products' => $promotionsDetails['products_and_addons']];
        }

        if ($promotionsDetails['discount_type'] == 'Fixed Percentage') {
            $coupon_object['percent_off'] = $promotionsDetails['amount'];
        } elseif ($promotionsDetails['discount_type'] == 'Fixed Price') {
            $coupon_object['amount_off'] = 100 * $promotionsDetails['amount'];
            $coupon_object['currency'] = config('app.currency');
        }

        $coupon = $this->stripe->coupons->create($coupon_object);

        $promotion_object = [
            'coupon' => $coupon->id,
            'code' => $promotionsDetails['code'],
            'max_redemptions' => $promotionsDetails['use_limit'],
            'expires_at' => strtotime($promotionsDetails['expire']),
        ];

        if($promotionsDetails['minimum_spend']) {
            $promotion_object['restrictions'] = ['minimum_amount' => $promotionsDetails['minimum_spend'], 'minimum_amount_currency' => config('app.currency')];
        }

        $promotion = $this->stripe->promotionCodes->create($promotion_object);
        $promotionsDetails['strip_coupon_id'] = $coupon->id;
        $promotionsDetails['stripe_promotion_id'] = $promotion->id;
        $promotionsDetails['metadata'] = ['description' => $promotionsDetails['description']];

        $promotions = Promotions::create($promotionsDetails);

        $emailobject = [];
        $emails = explode(',', $promotionsDetails['allowed_email']);
        foreach ($emails as $email) {
            $emailobject[] = [
                'email' => $email,
                'promotion_id' => $promotions->id,
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp,
            ];
        }
        $productAndAddonObjects = [];
        EmailRestricted::insert($emailobject);

        if (isset($promotionsDetails['products_and_addons']) && $promotionsDetails['products_and_addons']) {
            // Insert Products related to the promotion
            $products = Products::whereIn('strip_product_id', $promotionsDetails['products_and_addons'])->get();
            foreach ($products as $product) {
                $productAndAddonObjects[] = [
                    'product_id' => $product->id,
                    'addons_id' => null, // Assuming addons have no relation here
                    'promotion_id' => $promotions->id,
                    'is_exclude' => false,
                    'created_at' => $this->currentTimestamp,
                    'updated_at' => $this->currentTimestamp,
                ];
            }

            // Insert Addons related to the promotion
            $addons = Addons::whereIn('strip_product_id', $promotionsDetails['products_and_addons'])->get();
            foreach ($addons as $addon) {
                $productAndAddonObjects[] = [
                    'product_id' => null, // Assuming addons have no relation here
                    'addons_id' => $addon->id,
                    'promotion_id' => $promotions->id,
                    'is_exclude' => false,
                    'created_at' => $this->currentTimestamp,
                    'updated_at' => $this->currentTimestamp,
                ];
            }
        }

        if (isset($promotionsDetails['exclude_products_and_addons']) && $promotionsDetails['exclude_products_and_addons']) {
            // Insert Excluded Products related to the promotion
            $excludeProducts = Products::whereIn('strip_product_id', $promotionsDetails['exclude_products_and_addons'])->get();
            foreach ($excludeProducts as $excludeProduct) {
                $productAndAddonObjects[] = [
                    'product_id' => $excludeProduct->id,
                    'addons_id' => null, // Assuming addons have no relation here
                    'promotion_id' => $promotions->id,
                    'is_exclude' => true,
                    'created_at' => $this->currentTimestamp,
                    'updated_at' => $this->currentTimestamp,
                ];
            }

            // Insert Excluded Addons related to the promotion
            $excludeAddons = Addons::whereIn('strip_product_id', $promotionsDetails['exclude_products_and_addons'])->get();
            foreach ($excludeAddons as $excludeAddon) {
                $productAndAddonObjects[] = [
                    'product_id' => null, // Assuming addons have no relation here
                    'addons_id' => $excludeAddon->id,
                    'promotion_id' => $promotions->id,
                    'is_exclude' => true,
                    'created_at' => $this->currentTimestamp,
                    'updated_at' => $this->currentTimestamp,
                ];
            }
        }

        // Insert the gathered data into the database
        PromotionProductAndAddon::insert($productAndAddonObjects);

        // Return the promotions or perform other necessary operations
        return $promotions;
    }

    /**
     * This function updates a promotions.
     *
     * @param int $promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to update.
     *
     * @param array $promotionsDetails The parameter `promotionsDetails` is an array that contains the details of
     * the admin promotions that we want to update.promotionsDetails
     *
     * @return The updated promotions is being returned.
     */
    public function updatePromotion(int $promotionsId, array $promotionsDetails)
    {
        $promotions = Promotions::findOrFail($promotionsId);
        $promotions->update($promotionsDetails);
        $promotionsData = [];
        $promotionsData['metadata'] = ['description' => $promotionsDetails['description']];
        $this->stripe->promotionCodes->update(
            $promotions->stripe_promotion_id,
            $promotionsData
        );

        return $promotions;
    }

    /**
     * This function deletes a promotions.
     *
     * @param int $promotionsId The parameter `promotionsId` is an integer that represents the unique identifier of
     * the admin promotions that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deletePromotionById(int $promotionsId)
    {
        $promotions = Promotions::find($promotionsId);

        EmailRestricted::where('promotion_id', '=', $promotionsId)->delete();
        PromotionProductAndAddon::where('promotion_id', '=', $promotionsId)->delete();
        $this->stripe->promotionCodes->update($promotions->stripe_promotion_id, ['active' => false]);
        $this->stripe->coupons->delete($promotions->strip_coupon_id, []);
        $promotions->delete();

        return true;
    }
}
