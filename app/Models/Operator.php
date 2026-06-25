<?php

namespace App\Models;

use App\Models\Kapal;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
    ];

    public function kapals()
    {
        return $this->hasMany(Kapal::class, 'operator_id');
    }
}
