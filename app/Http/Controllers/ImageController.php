<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageIntervention;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\ImageThumbnail;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $file = $request->file('image');
        if ($file->getSize() > 5 * 1024 * 1024) {
            return response()->json(['error' => 'Image is too large'], 400);
        }

        $filename = time() . '.webp';
        $originalPath = "uploads/original/{$filename}";

        try {
            $image = ImageIntervention::make($file)->resize(1920, 1920, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90);

            Storage::disk('public')->put($originalPath, $image);
            

            $imageModel = Image::create(['original' => $originalPath]);

            $sizes = [
                'large' => 1920,
                'medium' => 768,
                'small' => 320,
            ];

            foreach ($sizes as $sizeKey => $size) {
                $thumbPath = "uploads/thumbnails/{$sizeKey}_{$filename}";
                
                $thumbnail = clone $image;
                $thumbnail->resize($size, $size, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp', 90);

                Storage::disk('public')->put($thumbPath, $thumbnail);

                ImageThumbnail::create([
                    'image_id' => $imageModel->id,
                    'size' => $sizeKey,
                    'path' => $thumbPath,
                ]);
            }

            return response()->json(['message' => 'Image uploaded successfully', 'image' => $imageModel->load('thumbnails')]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process image', 'details' => $e->getMessage()], 500);
        }
    }
}
