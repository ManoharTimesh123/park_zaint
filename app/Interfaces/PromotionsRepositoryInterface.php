<?php

namespace App\Interfaces;

interface PromotionsRepositoryInterface
{
    /**
     * Get a Promotion by its ID.
     *
     * @param int $PromotionId The ID of the Promotion.
     * @return mixed The retrieved Promotion.
     */
    public function getPromotionById(int $promotionId);

    /**
     * Create a new Promotion.
     *
     * @param array $PromotionDetails The details of the Promotion to be created.
     * @return mixed The newly created Promotion.
     */
    public function createPromotion(array $promotionDetails);

    /**
     * Update an existing Promotion.
     *
     * @param int $PromotionId The ID of the Promotion to be updated.
     * @param array $PromotionDetails The updated details of the Promotion.
     * @return mixed The updated Promotion.
     */
    public function updatePromotion(int $promotionId, array $promotionDetails);

    /**
     * Delete a Promotion by its ID.
     *
     * @param int $PromotionId The ID of the Promotion to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function deletePromotionById(int $promotionId);

    /**
     * Delete a Promotion by its ID.
     *
     * @param int $PromotionId The ID of the Promotion to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function getAllAddonsAndProducts();

    /**
     * Delete a Promotion by its ID.
     *
     * @param int $PromotionId The ID of the Promotion to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function getAllEmails(int $promotionId);
    
    /**
     * Delete a Promotion by its ID.
     *
     * @param int $PromotionId The ID of the Promotion to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function getAllPromotionsAddonsAndProducts(int $promotionId);

    /**
     * Delete a Promotion by its ID.
     *
     * @param int $PromotionId The ID of the Promotion to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function getAllExcludePromotionsAddonsAndProducts(int $promotionId);
    
}
