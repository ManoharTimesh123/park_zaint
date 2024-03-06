<?php

namespace App\Interfaces;

interface AddonsRepositoryInterface
{
    /**
     * Get a Addons by its ID.
     *
     * @param int $AddonsId The ID of the Addons.
     * @return mixed The retrieved Addons.
     */
    public function getAddonsById(int $AddonsId);

    /**
     * Get a All Addons.
     *
     * @return mixed The retrieved Addons.
     */
    public function getAllAddons();

    /**
     * Get a Addons options by its ID.
     *
     * @param int $AddonsId The ID of the Addons.
     * @return mixed The retrieved Addons.
     */
    public function getAddonsoptionById(int $AddonsId);

    
    /**
     * Create a new Addons.
     *
     * @param array $AddonsDetails The details of the Addons to be created.
     * @return mixed The newly created Addons.
     */
    public function createAddons(array $AddonsDetails);

    /**
     * Update an existing Addons.
     *
     * @param int $AddonsId The ID of the Addons to be updated.
     * @param array $AddonsDetails The updated details of the Addons.
     * @return mixed The updated Addons.
     */
    public function updateAddons(int $AddonsId, array $AddonsDetails);

    /**
     * Delete a Addons by its ID.
     *
     * @param int $AddonsId The ID of the Addons to be deleted.
     * @return bool True if deletion was successful, otherwise false.
     */
    public function deleteAddonsById(int $AddonsId);
}
