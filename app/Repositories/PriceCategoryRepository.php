<?php

namespace App\Repositories;

use App\Interfaces\PriceCategoryRepositoryInterface;
use App\Models\Airport;
use App\Models\AirportProductCategory;
use App\Models\AirpotMonthDayCategory;
use App\Models\Category;
use App\Models\Products;
use Carbon\Carbon;
use Exception;
use Stripe\StripeClient;

class PriceCategoryRepository implements PriceCategoryRepositoryInterface
{
    private $stripe;
    private $currentTimestamp;
    
    public function __construct()
    {
        $this->stripe = new StripeClient(config('app.stripe_secret'));
        $this->currentTimestamp = Carbon::now();
    }

    public function getAllProductsandAirport()
    {
        $products = Products::where('status', 1)
        ->whereNull('deleted_at')
        ->get(['id', 'strip_product_id', 'name']);

        $airport = Airport::where('status', 1)
        ->whereNull('deleted_at')
        ->get(['id', 'name']);

        return ['products' => $products, 'airport' => $airport];  // , 'addons' => $addons
    }

    /**
     * This function retrieves an admin PriceCategory by their ID.
     *
     * @param int PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to retrieve from the database.
     *
     * @return A PriceCategory with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAllCategory()
    {
        // Todo: Airpots will we inserted here.
        return Category::whereNull('deleted_at')
        ->get()->ToArray();
    }

    /**
     * This function retrieves an admin PriceCategory by their ID.
     *
     * @param int PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to retrieve from the database.
     *
     * @return A PriceCategory with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getPriceCategoryById(int $PriceCategoryId)
    {
        return Category::find($PriceCategoryId);
    }

    /**
     * This function creates an admin PriceCategory.
     *
     * @param array $PriceCategoryDetails The parameter `PriceCategoryDetails` is an array that contains the details of
     * the admin PriceCategory that we want to create.
     *
     * @return The created PriceCategory is being returned.
     */
    public function createPriceCategory(array $PriceCategoryDetails)
    {
        $PriceCategory = Category::create(['name' => $PriceCategoryDetails['newcategory']]);
        $newCategoryId = $PriceCategory->id;
        $categoryarray = [];
        foreach ($PriceCategoryDetails['prices'] as $day => $price) {
            $categoryarray[] = [
                'category_id' => $newCategoryId,
                'no_of_days' => intval($day) + 1,
                'price' => $price,
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp
            ];
        }
        $month = AirportProductCategory::insert($categoryarray);
        return $PriceCategory;
    }

    /**
     * This function updates a PriceCategory.
     *
     * @param int $PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to update.
     *
     * @param array $PriceCategoryDetails The parameter `PriceCategoryDetails` is an array that contains the details of
     * the admin PriceCategory that we want to update.PriceCategoryDetails
     *
     * @return The updated PriceCategory is being returned.
     */

    public function updatePriceCategory(int $PriceCategoryId, array $PriceCategoryDetails)
    {
        $PriceCategory = Category::findOrFail($PriceCategoryId);
        $PriceCategory->update(['name' => $PriceCategoryDetails['newcategory']]);

        $finalarray = [];
        foreach ($PriceCategoryDetails['prices'] as $day => $price){
            $finalarray[] = [
                'category_id' => $PriceCategoryId,
                'no_of_days' => intval($day) + 1,
                'price' => floatval($price),
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp
            ];
        }
        foreach ($finalarray as $record) {
            $catid = AirportProductCategory::updateOrCreate(
                [
                    'category_id' => $record['category_id'],
                    'no_of_days' => $record['no_of_days']
                ],
                $record
            );
        }

        return $PriceCategory;
    }

    /**
     * This function deletes a PriceCategory.
     *
     * @param int $PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to delete.
     *
     * @return A boolean value is being returned.
     */

    public function deletePriceCategoryById(int $PriceCategoryId)
    {
        $PriceCategory = Category::find($PriceCategoryId);
        $PriceCategory->delete();
        AirportProductCategory::where('category_id', '=', $PriceCategoryId)->delete();
        return true;
    }

    /**
     * This function deletes a PriceCategory.
     *
     * @param int $PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to delete.
     *
     * @return A boolean value is being returned.
     */

     public function createNewCategory(array $newCategory)
     {
        $newCategory['name'] = $newCategory['newcategory'];
        unset($newCategory['newcategory']);
        $catid = Category::create($newCategory);
         return $catid;
     }

    /**
     * This function deletes a PriceCategory.
     *
     * @param int $PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to delete.
     *
     * @return A boolean value is being returned.
     */

     public function createNoOfDays(array $noOfDays)
     {
        $finalarray = [];
        foreach ($noOfDays['noofdays'] as $day => $price){
            $finalarray[] = [
                'category_id' => $noOfDays['category'],
                'no_of_days' => intval($day),
                'price' => floatval($price),
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp
            ];
        }
        foreach ($finalarray as $record) {
            $catid = AirportProductCategory::updateOrCreate(
                [
                    'category_id' => $record['category_id'],
                    'no_of_days' => $record['no_of_days']
                ],
                $record
            );
        }
         return $catid;
     }

    /**
     * This function deletes a PriceCategory.
     *
     * @param int $PriceCategoryId The parameter `PriceCategoryId` is an integer that represents the unique identifier of
     * the admin PriceCategory that we want to delete.
     *
     * @return A boolean value is being returned.
     */

     public function createMonthCategorys(array $monthCategorys)
     {
        $records = [];
        foreach ($monthCategorys['monthcategories'] as $day => $category){
            $records[] = [
                'airport_id' => intval($monthCategorys['airport_id']),
                'category_id' => intval($category) != 0 ? intval($category) : null,
                'date' => intval($day),
                'month' => $monthCategorys['month'],
                'created_at' => $this->currentTimestamp,
                'updated_at' => $this->currentTimestamp
            ];
        }
        foreach ($records as $record) {
            try {
                $catid = AirpotMonthDayCategory::updateOrCreate(
                    [
                        'month' => $record['month'],
                        'date' => $record['date'],
                        'airport_id' => $monthCategorys['airport_id']
                    ],
                    $record
                );
            } catch(\Exception $e) {
                dd($e->getMessage());
            }

        }
         return $catid;
     }

     public function getCategoryByAirportId(array $productcategory) {
        return Category::with('AirpotMonthDayCategory')
        ->where('airport_id', $productcategory['airport_id'])
        ->where('product_id', $productcategory['product_id'])
        ->whereNull('deleted_at')->get()->ToArray();
     }

     public function getMonthCategoryByAirportId(array $monthCategoryid) {
        return Category::with(['airpotMonthDayCategory' =>  function($q) use ($monthCategoryid) {
            $q->where('airpot_month_day_categorys.month', $monthCategoryid['month']);
        }])
        ->where('airport_id', $monthCategoryid['airport_id'])
        ->whereNull('deleted_at')
        ->get()
        ->toArray();    
     }

     public function getNoOfDaysByCategoryId(int $categoryId) {
        return Category::with('AirportProductCategory')
        ->where('id', $categoryId)
        ->whereNull('deleted_at')
        ->get()->ToArray();
     }
}
