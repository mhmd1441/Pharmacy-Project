<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class Medicines extends Model
// {
//     public function getOrders()
//     {
//         return $this->belongsToMany(Orders::class);
//     }
//     public function getInventory()
//     {
//         return $this->belongsTo(Inventory::class, "inventory_id", "id");
//     }
// }

class Medicines extends Model
{
    protected $fillable = [
        'medicine_name', 'sku', 'manufacturer', 'description', 'dosage', 'price',
        'required_status', 'inventory_id', 'production_date', 'expiry_date'
    ];

    public function getOrders()
    {
        return $this->belongsToMany(Orders::class);
    }
    public function getInventory()
    {
        return $this->belongsTo(Inventory::class, "inventory_id", "id");
    }
}
