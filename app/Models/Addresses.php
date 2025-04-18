<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    public function getClient()
    {
        return $this->belongsTo(Clients::class, "client_id", "id");
    }
}
