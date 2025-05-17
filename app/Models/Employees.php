<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'role',
        'status',
        'hire_date',
        'password'
    ];
    public function getShipments()
    {
        return $this->hasMany(Shipping::class);
    }
    public function getSalaries()
    {
        return $this->hasOne(Shipping::class);
    }
}
