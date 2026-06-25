<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    protected $fillable = [
        'nama',
        'lokasi',
        'kode',
        'keterangan'
    ];
    
    public function kapals()
    {
        return $this->hasMany(Kapal::class);
    }
}
