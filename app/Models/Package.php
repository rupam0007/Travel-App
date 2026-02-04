<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'gallery',
        'nights',
        'days',
        'price',
        'original_price',
        'discount_percentage',
        'inclusions',
        'exclusions',
        'itinerary',
        'highlights',
        'best_time',
        'difficulty_level',
        'max_group_size',
        'rating',
        'reviews_count',
        'is_featured',
        'is_trending',
        'is_active',
    ];

    protected $casts = [
        'gallery' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'itinerary' => 'array',
        'highlights' => 'array',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'rating' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews(): HasMany
    {
        return $this->hasMany(Review::class)->where('is_approved', true);
    }

    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getDurationAttribute(): string
    {
        return "{$this->nights} Nights - {$this->days} Days";
    }

    public function getDiscountedPriceAttribute(): float
    {
        if ($this->discount_percentage > 0) {
            return $this->price - ($this->price * $this->discount_percentage / 100);
        }
        return $this->price;
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

    public function updateRating(): void
    {
        $this->rating = $this->approvedReviews()->avg('rating') ?? 0;
        $this->reviews_count = $this->approvedReviews()->count();
        $this->save();
    }
}
