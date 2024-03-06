<?php

namespace App\Repositories;

use App\Interfaces\TermsAndConditionsRepositoryInterface;
use App\Models\TermsAndConditions;

class TermsAndConditionsRepository implements TermsAndConditionsRepositoryInterface
{
    public $tAndCModel;

    public function __construct(
        TermsAndConditions $tAndCModel
    ) {
        $this->tAndCModel = $tAndCModel;
    }

    /**
     * This function retrieves terms and conditions.
     */
    public function getTermsAndConditions()
    {
        return TermsAndConditions::all();
    }

    /**
     * This function retrieves terms and conditions with there id.
     * @param int tAndCId
     */
    public function getTermsAndConditionsById(int $tAndCId)
    {
        return TermsAndConditions::where('id', '=', $tAndCId)->first();
    }

    /**
     * Generate a new terms and conditions with data provided.
     * @param int tAndCDetails
     */
    public function createTermsAndConditions(array $tAndCDetails)
    {
        return TermsAndConditions::insertGetId([
            'description' => $tAndCDetails['description'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Update an existing terms and conditions with the id and the updated data provided.
     * @param int tAndCId, tAndCDetails
     */
    public function updateTermsAndConditions(int $tAndCId, array $tAndCDetails)
    {
        $tAndC = TermsAndConditions::findOrFail($tAndCId);
        $tAndC->description = $tAndCDetails['description'];
        $tAndC->updated_at = now();
        $tAndC->save();

        return $tAndC;
    }

    /**
     * Soft delete terms and conditions with the id provided.
     * @param int tAndCId
     */
    public function deleteTermsAndConditionsById(int $tAndCId)
    {
        $tAndC = TermsAndConditions::findOrFail($tAndCId);
        $tAndC->delete();

        return $tAndC;
    }
}
