<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipping_cost extends Model
{
    public function getShipping()
    {
        return $this->belongsTo(Shipping::class, "shipping_id", "id");
    }
}
