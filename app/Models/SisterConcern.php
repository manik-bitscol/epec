<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class SisterConcern extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'is_active', 'banner', 'address', 'phone', 'email', 'facebook', 'twitter', 'whatsapp', 'instagram', 'description'];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}