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
    protected $guarded=['id'];

    public function scopeFilter($query,array $filters)
    {
        
        $query->when($filters['search']?? false, function($query,$search){
            return $query->where('nopol','like','%'.$search.'%')
            ->orWhere('year','like','%'.$search.'%')
            ->orWhere('kondisi','like','%'.$search.'%')
            ->orWhere('keterangan','like','%'.$search.'%');
        });
    }
    public function minyak()
    {
        return $this->belongsTo(Minyak::class,'data_truks_id','id');
    }   
    public function batubara()
    {
        return $this->belongsTo(Batubara::class,'batubaras_id','id');
    }   
}
