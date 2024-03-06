<?php

namespace App\Interfaces;

interface PricesRepositoryInterface
{
    /**
     * Get a Prices by its ID.
     *
     * @param int $PricesId The ID of the Prices.
     * @return mixed The retrieved Prices.
     */
    public function getPricesById(int $PricesId);

    /**
     * Get All Prices Category.
     *
     * @return mixed The retrieved Category.
     */
    public function getAllCategory();

    /**
     * Create a new Month Category.
     *
     * @param array $CategoryDetails The details of the Prices category to be created.
     * @return mixed The newly created Prices Category.
     */
    public function createMonthCategorys(array $CategoryDetails);

    /**
     * Create a new Month Category.
     *
     * @param array $CategoryDetails The details of the Prices category to be created.
     * @return mixed The newly created Prices Category.
     */
    public function getMonthCategoryByAirportAndProductId(array $monthCategoryid);

    /**
     * Create a new Prices.
     *
     * @param array $PricesDetails The details of the Prices to be created.
     * @return mixed The newly created Prices.
     */
    public function createPrices(array $PricesDetails);

    /**
     * Update an existing Prices.
     *
     * @param int $PricesId The ID of the Prices to be updated.
     * @param array $PricesDetails The updated details of the Prices.
     * @return mixed The updated Prices.
     */
    public function updatePrices(int $PricesId, array $PricesDetails);

    /**
     * Delete a Prices by its ID.
     *
     * @param int $PricesId The ID of the Prices to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function deletePricesById(int $PricesId);
}
