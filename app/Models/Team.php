<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'role_id',
        'degreee',
        'experience',
        'phone_number_1',
        'phone_owner_1',
        'phone_number_2',
        'phone_owner_2',
        'facebook_account',
        'whatsapp_account',
        'instagram_account',
        'linkedin_account',
        'twitter_account',
        'email_1',
        'email_owner_1',
        'email_2',
        'email_owner_2',
        'join_date',
        'signature',
        'description',
    ];
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}