<?php

namespace App\Interfaces;

interface TermsAndConditionsRepositoryInterface
{
    public function getTermsAndConditions();

    public function getTermsAndConditionsById(int $tAndCId);

    public function createTermsAndConditions(array $tAndCDetails);

    public function updateTermsAndConditions(int $tAndCId, array $tAndCDetails);

    public function deleteTermsAndConditionsById(int $tAndCId);
}
