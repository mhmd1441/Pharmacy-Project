<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicines extends Model
{
    use HasFactory;
    protected $table = 'medicines';

    protected $fillable = [
        'medicine_name',
        'sku',
        'manufacturer',
        'description',
        'dosage',
        'price',
        'quantity',
        'required_status',
        'inventory_id',
        'production_date',
        'expiry_date',
        'image'
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function getOrders()
    {
        return $this->belongsToMany(Orders::class);
    }

    public function getInventory()
    {
        return $this->belongsTo(Inventory::class, "inventory_id", "id");
    }
}
