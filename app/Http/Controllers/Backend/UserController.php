<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;

use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageIntervention;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->with(['image'])->paginate(15);
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'users'
        ));
    }

    public function updateAvatar(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $user = User::findOrFail($id);

        $file = $request->file('image');
        $filename = time() . '.webp';

        $path = $file->storeAs('images/originals', $filename, 'public');

        $image = ImageIntervention::make($file);
        if ($image->width() > 1920 || $image->height() > 1920) {
            $image->resize(1920, 1920, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        $image->encode('webp', 90);
        Storage::disk('public')->put($path, $image);

        $thumbnail_768 = 'images/thumbnails/768_' . $filename;
        $image->resize(768, 768, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::disk('public')->put($thumbnail_768, $image);

        $thumbnail_320 = 'images/thumbnails/320_' . $filename;
        $image->resize(320, 320, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::disk('public')->put($thumbnail_320, $image);

        if ($user->image) {
            Storage::disk('public')->delete($user->image->path);
            Storage::disk('public')->delete($user->image->thumbnail_768);
            Storage::disk('public')->delete($user->image->thumbnail_320);
            $user->image->delete();
        }

        $newImage = Image::create([
            'path' => $path,
            'thumbnail_768' => $thumbnail_768,
            'thumbnail_320' => $thumbnail_320
        ]);

        $user->image_id = $newImage->id;
        $user->save();

        return response()->json(['success' => true, 'image' => asset('storage/' . $newImage->thumbnail_320)]);
    }
}
