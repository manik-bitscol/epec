<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'phase_id', 'type_id', 'category_id', 'title', 'banner', 'address', 'duration', 'start_time', 'complete_time', 'building_size', 'construction_status', 'location_map', 'details'];

    public function galleries(): HasMany
    {
        return $this->hasMany(ProjectGallery::class);
    }

    public function image(): MorphOne
    {
        return $this->MorphOne(Image::class, 'imageable');

    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function phase(): BelongsTo
    {
        return $this->belongsTo(Phase::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

}