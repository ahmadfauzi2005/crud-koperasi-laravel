<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'pasword',
        'nama_lkp',
        'contact',
        'pejabat',
        ];
}
