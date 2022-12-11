<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'description', 'btn_text', 'btn_link', 'status', 'image_type'];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
