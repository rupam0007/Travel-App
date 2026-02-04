<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'destination_id',
        'name',
        'email',
        'phone',
        'city',
        'travel_date',
        'travelers',
        'message',
        'status',
    ];

    protected $casts = [
        'travel_date' => 'date',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }
}
