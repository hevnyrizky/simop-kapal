<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaPelayaran extends Model
{
    protected $fillable = [
        'nama',
        'keterangan',
    ];

    public function kapals()
    {
        return $this->hasMany(Kapal::class);
    }
}
