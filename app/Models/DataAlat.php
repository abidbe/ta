<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlat extends Model
{
    use HasFactory;

    protected $fillable = [    
        'name',
        'year',
        'kondisi',
        'keterangan',
        'image',
    ];
    protected $guarded=[];

    
    
    
}
