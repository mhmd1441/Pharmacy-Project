<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    public function getEmployee()
    {
        return $this->belongsTo(Employees::class, "employee_id", "id");
    }
}
