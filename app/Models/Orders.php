<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\OrderFactory;

class Orders extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return OrderFactory::new();
    }

    protected $fillable = [
        'order_date',
        'total_amount',
        'order_status',
        'client_id'
    ];

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
