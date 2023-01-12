<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlahAtasan',
        'jumlahBawahan',
        'warnaPakaian',
        'paketPewangi',
        'alamat',
        'regionId',
        'totalBayar',
        'payment_id',
        'statusPesanan'
    ];
}