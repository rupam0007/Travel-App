<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'banner_image',
        'best_time_to_visit',
        'climate',
        'packages_count',
        'is_trending',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_trending' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function activePackages(): HasMany
    {
        return $this->hasMany(Package::class)->where('is_active', true);
    }

    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
