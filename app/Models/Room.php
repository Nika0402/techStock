<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['nom', 'batiment', 'capacite'];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
