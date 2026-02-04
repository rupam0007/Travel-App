<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'booking_id',
        'name',
        'email',
        'location',
        'title',
        'review',
        'rating',
        'image',
        'travel_date',
        'is_approved',
        'is_featured',
    ];

    protected $casts = [
        'travel_date' => 'date',
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    protected static function booted()
    {
        static::saved(function ($review) {
            if ($review->package) {
                $review->package->updateRating();
            }
        });

        static::deleted(function ($review) {
            if ($review->package) {
                $review->package->updateRating();
            }
        });
    }
}
