<?php

namespace App\Repositories;

use App\Interfaces\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    /**
     * Store a newly provided image in storage.
     */
    public function uploadImage($request)
    {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('uploads'), $fileName);
        $url = asset('uploads/' . $fileName);

        return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
    }

    /**
     * Delete non required images.
     */
    public function deleteImages($imageUrlsArray, $filenames)
    {
        $filesToDelete = array_diff($imageUrlsArray, $filenames);

        foreach ($filesToDelete as $fileToDelete) {
            $filePath = public_path('uploads/' . $fileToDelete);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
}
