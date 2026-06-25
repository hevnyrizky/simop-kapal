<?php

namespace App\Models;

use App\Models\TipeKapal;
use App\Models\Operator;
use App\Models\Pelabuhan;
use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    protected $fillable = [
        'nama_kapal',
        'tipe_kapal_id',
        'operator_id',
        'pelabuhan_id',
        'area_pelayaran_id',
        'klasifikasi_id',
        'call_sign',
        'no_imo',
    ];

    public function tipeKapal()
    {
        return $this->belongsTo(TipeKapal::class, 'tipe_kapal_id');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }

    public function dokumenKapal()
    {
        return $this->hasMany(DokumenKapal::class);
    }

    public function pelabuhan()
    {
        return $this->belongsTo(Pelabuhan::class);
    }

    public function docking()
    {
        return $this->hasMany(Docking::class);
    }

    public function areaPelayaran()
    {
        return $this->belongsTo(AreaPelayaran::class);
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }
}
