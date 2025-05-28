<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{   
    protected $fillable = [
        'shipping_status', 'shipping_date', 'actual_shipping_date',
        'actual_arrival_date', 'arrival_date', 'employee_id'
    ];

    public function getOrders()
    {
       return $this->belongsToMany(Orders::class, 'order_shippings', 'shipping_id', 'order_id');
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
