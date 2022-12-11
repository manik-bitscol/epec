<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function image(): MorphOne
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
}