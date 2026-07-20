<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'nom',
        'marque',
        'numero_serie',
        'etat',
        'date_achat',
        'description',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
