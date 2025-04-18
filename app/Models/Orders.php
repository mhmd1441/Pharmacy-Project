<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function getClient()
    {
        return $this->belongsTo(Clients::class, "clients_id", "id");
    }
    public function getMedicines()
    {
        return $this->belongsToMany(Medicines::class);
    }
    public function getShippings()
    {
        return $this->belongsToMany(Shipping::class);
    }
    public function getPaymentDetails()
    {
        return $this->hasOne(PaymentDetails::class);
    }
}
