<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'license_number',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'latitude',
        'longitude',
        'business_hours',
        'is_24_hours',
        'has_emergency_services',
        'accepts_insurance',
        'delivery_fee',
        'min_order_amount',
        'delivery_radius_km',
        'is_delivery_available',
        'is_verified',
        'is_active',
    ];

    protected $casts = [
        'business_hours' => 'array',
        'is_24_hours' => 'boolean',
        'has_emergency_services' => 'boolean',
        'accepts_insurance' => 'boolean',
        'is_delivery_available' => 'boolean',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];
}
