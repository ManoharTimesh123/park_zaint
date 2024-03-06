<?php

namespace App\Repositories;

use App\Interfaces\PricesRepositoryInterface;
use App\Models\AirpotMonthDayCategory;
use App\Models\Category;
use Carbon\Carbon;


class PricesRepository implements PricesRepositoryInterface
{
    private $currentTimestamp;
    
    public function __construct()
    {
        $this->currentTimestamp = Carbon::now();
    }

    /**
     * This function retrieves an admin Prices by their ID.
     *
     * @param int PricesId The parameter `PricesId` is an integer that represents the unique identifier of
     * the admin Prices that we want to retrieve from the database.
     *
     * @return A Prices with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getAllCategory()
    {
        // Todo: Airpots will we inserted here.
        return Category::whereNull('deleted_at')        
        ->get();
    }

    /**
     * This function retrieves an admin Prices by their ID.
     *
     * @param int PricesId The parameter `PricesId` is an integer that represents the unique identifier of
     * the admin Prices that we want to retrieve from the database.
     *
     * @return A Prices with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getPricesById(int $PricesId)
    {
    }

    /**
     * This function creates an admin Prices.
     *
     * @param array $PricesDetails The parameter `PricesDetails` is an array that contains the details of
     * the admin Prices that we want to create.
     *
     * @return The created Prices is being returned.
     */
    public function createPrices(array $PricesDetails)
    {        
    }

    /**
     * This function updates a Prices.
     *
     * @param int $PricesId The parameter `PricesId` is an integer that represents the unique identifier of
     * the admin Prices that we want to update.
     *
     * @param array $PricesDetails The parameter `PricesDetails` is an array that contains the details of
     * the admin Prices that we want to update.PricesDetails
     *
     * @return The updated Prices is being returned.
     */

    public function updatePrices(int $PricesId, array $PricesDetails)
    {
    }
    
    /**
     * This function deletes a Prices.
     *
     * @param int $PricesId The parameter `PricesId` is an integer that represents the unique identifier of
     * the admin Prices that we want to delete.
     *
     * @return A boolean value is being returned.
     */

    public function deletePricesById(int $PricesId)
    {
    }

    /**
     * This function deletes a Prices.
     *
     * @param int $PricesId The parameter `PricesId` is an integer that represents the unique identifier of
     * the admin Prices that we want to delete.
     *
     * @return A boolean value is being returned.
     */

    public function createMonthCategorys(array $monthCategorys)
    {
    $records = [];
    foreach ($monthCategorys['monthcategories'] as $day => $category){
        $records[] = [
            'airport_id' => intval($monthCategorys['airport_id']),
            'product_id' => intval($monthCategorys['product_id']),
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
                    'airport_id' => $monthCategorys['airport_id'],
                    'product_id' => $monthCategorys['product_id']
                ],
                $record
            );
        } catch(\Exception $e) {
            dd($e->getMessage());
        }

    }
        return $catid;
    }

    public function getMonthCategoryByAirportAndProductId(array $monthCategoryid) {
    return Category::with(['airpotMonthDayCategory' =>  function($q) use ($monthCategoryid) {
        $q->where('airpot_month_day_categorys.month', $monthCategoryid['month'])
        ->where('airport_id', $monthCategoryid['airport_id'])
        ->where('product_id', $monthCategoryid['product_id']);
    }])
    ->whereNull('deleted_at')
    ->get()
    ->toArray();
    }

}
