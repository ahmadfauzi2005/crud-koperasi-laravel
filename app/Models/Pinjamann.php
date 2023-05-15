<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjamann extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'anggota',
        'angsuran',
        'petugas'
        ];
}
