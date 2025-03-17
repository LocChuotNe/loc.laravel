<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageThumbnail extends Model
{
    use HasFactory;

    protected $fillable = ['image_id', 'size', 'path'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
