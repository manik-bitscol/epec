<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['parent', 'is_active', 'title', 'slug', 'sub_title', 'description'];

    public function image(): MorphOne
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
}