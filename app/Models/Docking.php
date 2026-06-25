<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docking extends Model
{
    protected $fillable = [
        'kapal_id',
        'tanggal_docking',
        'lokasi',
        'jenis_docking',
        'status',
        'catatan',
    ];

    public function kapal()
    {
        return $this->belongsTo(Kapal::class, 'kapal_id');
    }
}
