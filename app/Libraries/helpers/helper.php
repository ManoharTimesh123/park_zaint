<?php

if (!function_exists('isLinkActive')) {
    /**
     * If the current route is equal to the given route, return the string 'active', otherwise return an empty string.
     *
     * @param route The route that you want to compare with the current route.
     *
     * @return The function isLinkActive is being returned.
     */
    function isLinkActive($route)
    {
        return request()->is($route) ? 'active' : '';
    }
}

if (!function_exists('isCheckedOrNot')) {
    /**
     * If the value is equal to 1, return the string 'checked', otherwise return an empty string.
     *
     * @param value The value of the checkbox.
     *
     * @return The function isCheckedOrNot is being returned.
     */
    function isCheckedOrNot($value)
    {
        return $value === 1 ? 'checked="checked"' : '';
    }
}

if (!function_exists('getCurrentDateTime')) {
    /**
     * Get current DateTime.
     *
     * @return string The current date time
     */
    function getCurrentDateTime()
    {
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('uploadImages')) {
    /**
     * It takes an image and a destination, and uploads the image to the destination.
     *
     * @param image The image file that you want to upload.
     * @param destination The destination folder where you want to upload the image.
     *
     * @return The name of the image.
     */
    function uploadImages($image, $destination)
    {
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path($destination);
        $image->move($destinationPath, $name);

        return $name;
    }
}

if (!function_exists('getFileNames')) {
    /**
     * It filters and create an array of images from description that needs to be deleted from the storage.
     */
    function getFileNames($description)
    {
        $pattern = '/src="[^"]*\/uploads\/([^"]+)"/';

        $matches = [];
        preg_match_all($pattern, $description, $matches);

        return $matches[1];
    }
}

if (!function_exists('imgUrlAdapter')) {
    /**
     * It filters and create an array of images from description that needs to be deleted from the storage.
     */
    function imgUrlAdapter($add, $remove, $description)
    {
        return str_replace($add, $remove, $description);
    }
}
