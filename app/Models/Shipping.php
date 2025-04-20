<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function getOrders()
    {
        return $this->belongsToMany(Orders::class);
    }
    public function getEmployee()
    {
        return $this->belongsTo(Employees::class, "employee_id", "id");
    }
    public function getShippingCost()
    {
        return $this->hasOne(Shipping_Cost::class);
    }
}
