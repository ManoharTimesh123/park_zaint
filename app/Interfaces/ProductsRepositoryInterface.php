<?php

namespace App\Interfaces;

interface ProductsRepositoryInterface
{
    /**
     * Get a Products by its ID.
     *
     * @param int $ProductsId The ID of the Products.
     * @return mixed The retrieved Products.
     */
    public function getProductsById(int $ProductsId);

    /**
     * Get a All Products.
     *
     * @return mixed The retrieved All Products.
     */
    public function getAllProducts();

    /**
     * Create a new Products.
     *
     * @param array $ProductsDetails The details of the Products to be created.
     * @return mixed The newly created Products.
     */
    public function createProducts(array $ProductsDetails);

    /**
     * Update an existing Products.
     *
     * @param int $ProductsId The ID of the Products to be updated.
     * @param array $ProductsDetails The updated details of the Products.
     * @return mixed The updated Products.
     */
    public function updateProducts(int $ProductsId, array $ProductsDetails);

    /**
     * Delete a Products by its ID.
     *
     * @param int $ProductsId The ID of the Products to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function deleteProductsById(int $ProductsId);
}
