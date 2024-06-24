<?php

namespace App\Exports;

use App\Models\Batubara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BatubaraExport implements FromCollection, WithHeadings, WithMapping, WithCustomStartCell, WithEvents
{
    protected $startDate;
    protected $endDate;
    protected $totalRetase;
    protected $totalBucket;
    protected $totalEstimasiTonase;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        // Calculate totals
        $data = Batubara::whereBetween('date', [$this->startDate, $this->endDate])->get();
        $this->totalRetase = $data->sum('jumlah_retase');
        $this->totalBucket = $data->sum('jumlah_bucket');
        $this->totalEstimasiTonase = $data->sum('estimasi_tonase');
    }

    public function collection()
    {
        return Batubara::whereBetween('date', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'No Polisi',
            'Lokasi',
            'Driver',
            'Jumlah Retase',
            'Jumlah Bucket',
            'Estimasi Tonase',
            'DT Gendong',
            'Tujuan'
        ];
    }

    public function map($batubara): array
    {
        return [
            \Carbon\Carbon::parse($batubara->date)->isoFormat('dddd, DD MMMM YYYY'),
            $batubara->data_truks_id ? $batubara->dataTruk->nopol : '',
            $batubara->lokasi,
            $batubara->driver,
            $batubara->jumlah_retase,
            $batubara->jumlah_bucket,
            $batubara->estimasi_tonase,
            $batubara->dt_gendong,
            $batubara->tujuan,
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
                $highestRow = $event->sheet->getHighestRow();
                $totalRow = $highestRow + 2; // Leave a row gap

                $event->sheet->appendRows([
                    ['Total', '', '', '', $this->totalRetase, $this->totalBucket, $this->totalEstimasiTonase, '', '']
                ], $event);
            },
        ];
    }
}
