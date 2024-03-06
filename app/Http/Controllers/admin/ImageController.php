<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageRepositoryInterface;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $imageRepositoryInterface;

    public function __construct(
        ImageRepositoryInterface $imageRepositoryInterface,
    ) {
        $this->imageRepositoryInterface = $imageRepositoryInterface;
    }

    /**
     * Store a newly provided image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request)
    {
        try {
            if ($request->hasFile('upload')) {
                return $this->imageRepositoryInterface->uploadImage($request);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
