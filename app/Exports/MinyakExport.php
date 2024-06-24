<?php

namespace App\Exports;

use App\Models\Minyak;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MinyakExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithEvents
{
    protected $startDate;
    protected $endDate;
    protected $sisaPemasukan;
    protected $sisaPengeluaran;
    protected $totalPemasukan;
    protected $totalPengeluaran;
    protected $sisaMinyak;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        // Calculate totals up to the end date
        $totalData = Minyak::where('date', '<=', $this->endDate)->get();
        $this->sisaPemasukan = $totalData->where('type', 'Pemasukan')->sum('amount');
        $data = Minyak::where('date', '<=', $this->endDate)->get();
        $this->sisaPengeluaran = $data->where('type', 'Pengeluaran')->sum('amount');

        // Calculate sisa minyak
        $this->sisaMinyak = $this->sisaPemasukan - $this->sisaPengeluaran;


        $dataTotal = Minyak::whereBetween('date', [$this->startDate, $this->endDate])->get();
        $this->totalPemasukan = $dataTotal->where('type', 'Pemasukan')->sum('amount');
        $this->totalPengeluaran = $dataTotal->where('type', 'Pengeluaran')->sum('amount');
    }

    public function collection()
    {
        return Minyak::whereBetween('date', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jenis Unit',
            'Pemasukan (per liter)',
            'Pengeluaran (per liter)',
            'Keterangan'
        ];
    }

    public function map($minyak): array
    {
        return [
            \Carbon\Carbon::parse($minyak->date)->isoFormat('dddd, DD MMMM YYYY'),
            $minyak->data_alats_id ? $minyak->dataAlat->name : ($minyak->data_truks_id ? $minyak->dataTruk->nopol : ''),
            $minyak->type == 'Pemasukan' ? $minyak->amount : '',
            $minyak->type == 'Pengeluaran' ? $minyak->amount : '',
            $minyak->keterangan,
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->appendRows([
                    ['Total', '', $this->totalPemasukan, $this->totalPengeluaran, ''],
                    ['Sisa Minyak', '', $this->sisaMinyak, '', '']
                ], $event);
            },
        ];
    }
}
