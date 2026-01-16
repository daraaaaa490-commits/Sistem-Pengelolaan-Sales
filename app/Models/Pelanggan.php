<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'no_hp'
    ];
}
