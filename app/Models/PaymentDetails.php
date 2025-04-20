<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    public function getOrder()
    {
        return $this->belongsTo(Orders::class, "order_id", "id");
    }
}
