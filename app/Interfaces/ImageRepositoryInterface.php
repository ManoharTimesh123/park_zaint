<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageRepositoryInterface
{
    public function uploadImage(Request $request);

    public function deleteImages(array $imageUrlsArray, array $filenames);
}
