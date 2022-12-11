<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class ImageUplaoder
{
    public static function upload($image, $path, $width = 1080, $height = 1080)
    {
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->save($path . $fileName);
        $url = $path . $fileName;
        return $url;
        // ->resize($width, $height)
    }
    public static function update($oldImage, $image, $path, $width = 1080, $height = 1080)
    {

        if (file_exists($oldImage))
        {
            unlink($oldImage);
        }
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->save($path . $fileName);
        $url = $path . $fileName;
        return $url;
    }
    public static function delete($image)
    {
        if (file_exists($image))
        {
            unlink($image);
        }
        return true;
    }
}