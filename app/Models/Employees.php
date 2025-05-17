<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = ['name', 'email', 'position'];
    public function getShipments()
    {
        return $this->hasMany(Shipping::class);
    }
    public function getSalaries()
    {
        return $this->hasOne(Shipping::class);
    }
}
