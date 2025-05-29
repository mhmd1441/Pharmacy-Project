<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\EmployeeFactory;

class Employees extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return EmployeeFactory::new();
    }
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'role',
        'status',
        'hire_date',
        'password'
    ];
    public function getShipments()
    {
        return $this->hasMany(Shipping::class);
    }
    public function getSalaries()
    {
        return $this->hasOne(Shipping::class);
    }
}
