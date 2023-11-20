<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batubara extends Model
{
    use HasFactory;
    protected $fillable = [
        "lokasi",
        "driver",
        "jumlah_retase",
        "jumlah_bucket",
        "estimasi_tonase",
        "dt_gendong",
        "tujuan",
        "data_truks_id",
        "date",
    ];
    protected $casts = [
        'date' => 'date',
    ];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('lokasi', 'like', '%' . $search . '%')
                ->orWhere('driver', 'like', '%' . $search . '%')
                ->orWhere('jumlah_retase', 'like', '%' . $search . '%')
                ->orWhere('jumlah_bucket', 'like', '%' . $search . '%')
                ->orWhere('estimasi_tonase', 'like', '%' . $search . '%')
                ->orWhere('dt_gendong', 'like', '%' . $search . '%')
                ->orWhere('tujuan', 'like', '%' . $search . '%')
                ->orWhereHas('dataTruk', function ($query) use ($search) {
                    $query->where('nopol', 'like', '%' . $search . '%');
                })
                ->orWhere('date', 'like', '%' . $search . '%');
        });
    }
    public function dataTruk()
    {
        return $this->belongsTo(DataTruk::class, 'data_truks_id', 'id');
    }
}
