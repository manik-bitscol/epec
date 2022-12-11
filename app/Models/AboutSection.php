<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'logo',
        'about',
        'mission',
        'vission',
        'value',
        'btn_text',
        'btn_link',
    ];
}