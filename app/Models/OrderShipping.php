<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Employees;

class OrderShipping extends Model
{
    protected $table = 'order_shippings';

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }
}

