<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{ 
    protected $fillable = ['date', 'type', 'commentaire', 'device_id'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
