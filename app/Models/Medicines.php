<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    public function getOrders()
    {
        return $this->belongsToMany(Orders::class);
    }
    public function getInventory()
    {
        return $this->belongsTo(Inventory::class, "inventory_id", "id");
    }
}
