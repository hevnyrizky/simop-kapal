<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class DokumenKapal extends Model
{
    protected $fillable = [
        'kapal_id',
        'jenis_dokumen_id',
        'nomor_dokumen',
        'tanggal_terbit',
        'tanggal_expired',
        'file',
    ];
    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }

    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class);
    }

    public function getStatusAttribute()
    {
        if (!$this->tanggal_expired) {
            return 'unknown';
        }

        $today = Carbon::today();
        $expired = Carbon::parse($this->tanggal_expired);

        if ($expired->lt($today)) {
            return 'expired';
        }

        if ($expired->diffInDays($today) <= 30) {
            return 'warning';
        }

        return 'active';
    }

    public function getSisaHariAttribute()
    {
        if (!$this->tanggal_expired) return null;

        $today = Carbon::today();
        $expired = Carbon::parse($this->tanggal_expired)->startOfDay();

        return (int) $today->diffInDays($expired, false);
    }
}
