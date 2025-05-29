<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_name',
        'city',
        'country',
        'street',
        'building',
        'quantity_in_stock',
        'last_updated',
        'created_at',
        'updated_at'
    ];
    public function getMedicines()
    {
        return $this->hasMany(Medicines::class);
    }
}
