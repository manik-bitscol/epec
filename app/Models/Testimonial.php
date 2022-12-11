<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'profession', 'testimonial'];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}