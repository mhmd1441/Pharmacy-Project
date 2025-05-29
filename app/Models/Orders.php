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

    public function medicines()
    {
        return $this->belongsToMany(Medicines::class, 'order_medicines')
            ->withPivot(['quantity', 'price']);
    }

    public function shipping()
    {
        return $this->hasOne(OrderShipping::class);
    }

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
