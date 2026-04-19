<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kue extends Model
{
    protected $fillable = [
        'nama_kue',
        'harga',
        'stok',
        'deskripsi'
    ];
}