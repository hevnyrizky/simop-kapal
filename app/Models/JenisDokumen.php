<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    protected $fillable = [
        'nama',
        'masa_berlaku',
    ];
    public function dokumenKapal()
    {
        return $this->hasMany(DokumenKapal::class);
    }
}
