<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public function getAddresses()
    {
        return $this->hasMany(Addresses::class);
    }
    public function getOrders()
    {
        return $this->hasMany(Orders::class);
    }
}
