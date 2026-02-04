<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'user_id',
        'package_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'travel_date',
        'adults',
        'children',
        'infants',
        'special_requirements',
        'total_amount',
        'paid_amount',
        'status',
        'payment_status',
        'payment_method',
        'transaction_id',
    ];

    protected $casts = [
        'travel_date' => 'date',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public static function generateBookingNumber(): string
    {
        $prefix = 'VRM';
        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -4));
        return "{$prefix}{$date}{$random}";
    }

    public function getTotalTravelersAttribute(): int
    {
        return $this->adults + $this->children + $this->infants;
    }

    public function getBalanceAmountAttribute(): float
    {
        return $this->total_amount - $this->paid_amount;
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
