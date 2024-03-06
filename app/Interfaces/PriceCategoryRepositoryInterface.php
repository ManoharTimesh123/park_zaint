<?php

namespace App\Interfaces;

interface PriceCategoryRepositoryInterface
{
    /**
     * Get a PriceCategory by its ID.
     *
     * @param int $PriceCategoryId The ID of the PriceCategory.
     * @return mixed The retrieved PriceCategory.
     */
    public function getPriceCategoryById(int $PriceCategoryId);

    /**
     * Get a All Products And Airport.
     *
     * @return mixed The retrieved PriceCategory.
     */
    public function getAllProductsandAirport();

    /**
     * Get a All Price Category.
     *
     * @return mixed The retrieved PriceCategory.
     */
    public function getAllCategory();

    /**
     * Create a new PriceCategory.
     *
     * @param array $PriceCategoryDetails The details of the PriceCategory to be created.
     * @return mixed The newly created PriceCategory.
     */
    public function createPriceCategory(array $PriceCategoryDetails);

    /**
     * Create a new PriceCategory.
     *
     * @param array $PriceCategoryDetails The details of the PriceCategory to be created.
     * @return mixed The newly created PriceCategory.
     */
    public function createNewCategory(array $PriceCategoryDetails);

    /**
     * Create a new MonthCategoryDetails.
     *
     * @param array $MonthCategoryDetails The details of the MonthCategory to be created.
     * @return mixed The newly created PriceCategory.
     */
    public function createMonthCategorys(array $MonthCategoryDetails);

    /**
     * Get a Airport Details by Airportid.
     *
     * @param array $Airportid Airport id.
     * @return mixed give category airport details.
     */
    public function getCategoryByAirportId(array $Airportid);
    
    /**
     * Get a Month Category Airport Details by Airportid.
     *
     * @param array $Airportid Airport id.
     * @return mixed give category airport details.
     */
    public function getMonthCategoryByAirportId(array $Airportid);

    /**
     * Get a No of days Category Details by Categoryid.
     *
     * @param array $Categoryid Category id.
     * @return mixed give category airport details.
     */
    public function getNoOfDaysByCategoryId(int $Categoryid);

    /**
     * Create a No Of Days for PriceCategory.
     *
     * @param array $NoOfDaysDetails The details of the No of Days of PriceCategory to be created.
     * @return mixed The newly created PriceCategory.
     */
    public function createNoOfDays(array $NoOfDaysDetails);

    /**
     * Update an existing PriceCategory.
     *
     * @param int $PriceCategoryId The ID of the PriceCategory to be updated.
     * @param array $PriceCategoryDetails The updated details of the PriceCategory.
     * @return mixed The updated PriceCategory.
     */
    public function updatePriceCategory(int $PriceCategoryId, array $PriceCategoryDetails);

    /**
     * Delete a PriceCategory by its ID.
     *
     * @param int $PriceCategoryId The ID of the PriceCategory to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function deletePriceCategoryById(int $PriceCategoryId);
}
