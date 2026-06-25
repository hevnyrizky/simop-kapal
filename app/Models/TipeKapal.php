<?php

namespace App\Models;

use App\Models\Kapal;
use Illuminate\Database\Eloquent\Model;

class TipeKapal extends Model
{
    protected $fillable = [
        'nama',
    ];
    
    public function kapals()
    {
        return $this->hasMany(Kapal::class, 'tipe_kapal_id');
    }
}
