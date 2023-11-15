<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTruk extends Model
{
    use HasFactory;

    protected $fillable = [    
        'nopol',
        'year',
        'kondisi',
        'keterangan',
        'image',
    ];
}
