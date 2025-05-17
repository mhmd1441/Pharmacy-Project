<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ClientFactory;

class Clients extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return ClientFactory::new();
    }

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'dateOfBirth',
        'allergies',
        'email',
        'mobile_number',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getAddresses()
    {
        return $this->hasMany(Addresses::class);
    }
    public function getOrders()
    {
        return $this->hasMany(Orders::class);
    }
}
