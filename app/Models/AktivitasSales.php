<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasSales extends Model
{
    protected $table = 'aktivitas_sales';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pelanggan_id',
        'tanggal',
        'aktivitas',
        'hasil'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}
