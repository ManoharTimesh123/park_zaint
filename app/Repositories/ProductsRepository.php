<?php

namespace App\Repositories;

use App\Interfaces\ProductsRepositoryInterface;
use App\Models\Products;
use Stripe\StripeClient;

class ProductsRepository implements ProductsRepositoryInterface
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('app.stripe_secret'));
    }

    /**
     * This function retrieves an admin Products by their ID.
     *
     * @param int ProductsId The parameter `ProductsId` is an integer that represents the unique identifier of
     * the admin Products that we want to retrieve from the database.
     *
     * @return A Products with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getProductsById(int $ProductsId)
    {
        return Products::find($ProductsId);
    }

    /**
     * This function retrieves all Products.
     */
    public function getAllProducts()
    {
        return Products::where('deleted_at', '=', null)
        ->get();
    }

    /**
     * This function creates an admin Products.
     *
     * @param array $ProductsDetails The parameter `ProductsDetails` is an array that contains the details of
     * the admin Products that we want to create.
     *
     * @return The created Products is being returned.
     */
    public function createProducts(array $ProductsDetails)
    {
        $stripe_object = $this->stripe->products->create([
            'name' => $ProductsDetails['name'],
            'description' => $ProductsDetails['description'],
            'active' => (bool) $ProductsDetails['status'],
        ]);

        $ProductsDetails['strip_product_id'] = $stripe_object->id;
        $Products = Products::create($ProductsDetails);

        return $Products;
    }

    /**
     * This function updates a Products.
     *
     * @param int $ProductsId The parameter `ProductsId` is an integer that represents the unique identifier of
     * the admin Products that we want to update.
     *
     * @param array $ProductsDetails The parameter `ProductsDetails` is an array that contains the details of
     * the admin Products that we want to update.ProductsDetails
     *
     * @return The updated Products is being returned.
     */

    /** TODO : Update prices is pending */
    public function updateProducts(int $productsId, array $productsDetails)
    {
        $products = Products::findOrFail($productsId);
        $products->update($productsDetails);
        $this->stripe->products->update(
            $products->strip_product_id,
            [
                'name' => $productsDetails['name'],
                'description' => $productsDetails['description'],
                'active' => (bool) $productsDetails['status'],
                ]
        );

        return $products;
    }

    /**
     * This function deletes a Products.
     *
     * @param int $ProductsId The parameter `ProductsId` is an integer that represents the unique identifier of
     * the admin Products that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteProductsById(int $ProductsId)
    {
        $Products = Products::find($ProductsId);
        $Products->delete();

        $this->stripe->products->delete($Products->strip_product_id);

        return true;
    }
}
