<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $fillable = [
        'nama',
        'negara',
        'keterangan',
    ];

    public function kapals()
    {
        return $this->hasMany(Kapal::class);
    }
}
