<?php

namespace App\Repositories;

use App\Interfaces\AddonsRepositoryInterface;
use App\Models\Addons;
use App\Models\AddonsOptions;
use Carbon\Carbon;
use Stripe\StripeClient;

class AddonsRepository implements AddonsRepositoryInterface
{
    private $stripe;
    private $currentTimestamp;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('app.stripe_secret'));
        $this->currentTimestamp = Carbon::now();
    }

    /**
     * This function retrieves an admin Addons by their ID.
     *
     * @param int addonsId The parameter `addonsId` is an integer that represents the unique identifier of
     * the admin Addons that we want to retrieve from the database.
     *
     * @return A Addons with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAddonsById(int $addonsId)
    {
        return Addons::find($addonsId);
    }

    /**
     * This function retrieves all Products.
     */
    public function getAllAddons()
    {
        return Addons::where('deleted_at', '=', null)
        ->get();
    }

    /**
     * This function retrieves an admin Addons by their ID.
     *
     * @param int addonsId The parameter `addonsId` is an integer that represents the unique identifier of
     * the admin Addons that we want to retrieve from the database.
     *
     * @return A Addons with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAddonsoptionById(int $addonsId)
    {
        return AddonsOptions::with('addons')->where('addons_id', '=', $addonsId)->get();
    }

    /**
     * This function creates an admin Addons.
     *
     * @param array $AddonsDetails The parameter `AddonsDetails` is an array that contains the details of
     * the admin Addons that we want to create.
     *
     * @return The created Addons is being returned.
     */
    public function createAddons(array $addonsDetails)
    {
        $stripe_object = $this->stripe->products->create([
            'name' => $addonsDetails['name'],
            'description' => $addonsDetails['description'],
            'active' => (bool) $addonsDetails['status'],
            'metadata' => [
                'product_type' => 'Addon',
            ],
        ]);
        $addonsDetails['strip_product_id'] = $stripe_object->id;

        $alladdonsoptions = [];
        $Addons = Addons::create($addonsDetails);
        foreach ($addonsDetails['option_name'] as $key => $value) {
            $strip_price = $this->stripe->prices->create([
                'unit_amount' => $addonsDetails['option_price'][$key],
                'currency' => config('app.currency'),
                'product' => $stripe_object->id,
                'nickname' => $value,
                'metadata' => [
                    'product_type' => 'Addon',
                ],
            ]);
            $alladdonsoptions[] = [
                'addons_id' => $Addons->id,
                'name' => $value,
                'price' => $addonsDetails['option_price'][$key],
                'strip_price_id' => $strip_price->id,
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp,
            ];
        }
        AddonsOptions::insert($alladdonsoptions);

        return $Addons;
    }

    /**
     * This function updates a Addons.
     *
     * @param int $addonsId The parameter `addonsId` is an integer that represents the unique identifier of
     * the admin Addons that we want to update.
     *
     * @param array $addonsDetails The parameter `addonsDetails` is an array that contains the details of
     * the admin Addons that we want to update.addonsDetails
     *
     * @return The updated Addons is being returned.
     */
    public function updateAddons(int $addonsId, array $addonsDetails)
    {
        $Addons = Addons::findOrFail($addonsId);
        $this->stripe->products->update(
            $Addons['strip_product_id'],
            [
                'name' => $addonsDetails['name'],
                'description' => $addonsDetails['description'],
                'active' => (bool) $addonsDetails['status'],
            ]
        );
        $alladdons = AddonsOptions::where('addons_id', $Addons->id)->get();

        foreach ($alladdons as $addon) {
            $arrayname = array_search($addon->name, $addonsDetails['option_name']);
            $arrayprice = array_search($addon->price, $addonsDetails['option_price']);

            if ($arrayname !== false && $arrayprice !== false) {
                // Update the Stripe price details
                $this->stripe->prices->update(
                    $addon->strip_price_id,
                    [
                        'active' => (bool) $addonsDetails['status'],
                        'nickname' => $addonsDetails['option_name'][$arrayname],
                    ]
                );

                // Remove used option_name and option_price
                unset($addonsDetails['option_name'][$arrayname]);
                unset($addonsDetails['option_price'][$arrayprice]);
            } else {
                // Deactivate the price in Stripe and delete the addon
                $this->stripe->prices->update(
                    $addon->strip_price_id,
                    [
                        'active' => false,
                    ]
                );
                $addon->delete();
            }
        }
        $alladdonoption = [];
        foreach ($addonsDetails['option_name'] as $key => $value) {
            $strip_price = $this->stripe->prices->create([
                'unit_amount' => $addonsDetails['option_price'][$key],
                'currency' => config('app.currency'),
                'product' => $Addons->strip_product_id,
                'nickname' => $value,
                'metadata' => [
                    'product_type' => 'Addon',
                ],
            ]);

            $alladdonoption[] = [
                'addons_id' => $Addons->id,
                'name' => $value,
                'price' => $addonsDetails['option_price'][$key],
                'strip_price_id' => $strip_price->id,
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp,
            ];
        }
        AddonsOptions::insert($alladdonoption);

        $Addons->update($addonsDetails);

        return $Addons;
    }

    /**
     * This function deletes a Addons.
     *
     * @param int $addonsId The parameter `addonsId` is an integer that represents the unique identifier of
     * the admin Addons that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteAddonsById(int $addonsId)
    {
        $Addons = Addons::find($addonsId);
        $Addons->delete();
        AddonsOptions::where('addons_id', $addonsId)->delete();
        $this->stripe->products->update($Addons->strip_product_id, ['active' => false]);

        return true;
    }
}
