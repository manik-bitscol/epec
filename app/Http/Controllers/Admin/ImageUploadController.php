<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file'))
        {

            $file     = $request->file('file');
            $fileName = $file->getClientOriginalName();
            Image::make($file)->save('uploads/tiny-images/' . $fileName);
            $url = '/uploads/tiny-images/' . $fileName;
            return response()->json([
                'location' => $url,
            ]);

        }

    }
}