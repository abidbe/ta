<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minyak extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'data_alats_id',
        'data_truks_id',
        'amount',
        'keterangan',
        'date',
    ];
    protected $casts = [
        'date' => 'date',
    ];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('type', 'like', '%' . $search . '%')
                ->orWhereHas('dataAlat', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('dataTruk', function ($query) use ($search) {
                    $query->where('nopol', 'like', '%' . $search . '%');
                })
                ->orWhere('amount', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhere('date', 'like', '%' . $search . '%');
        });
    }
    public function scopePemasukan($query)
    {
        return $query->where('type', 'Pemasukan');
    }

    public function scopePengeluaran($query)
    {
        return $query->where('type', 'Pengeluaran');
    }
    public function dataAlat()
    {
        return $this->belongsTo(DataAlat::class,'data_alats_id','id');
    }
    public function dataTruk()
    {
        return $this->belongsTo(DataTruk::class, 'data_truks_id', 'id');
    }
}
