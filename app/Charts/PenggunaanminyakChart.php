<?php

namespace App\Charts;

use App\Models\Minyak;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class PenggunaanminyakChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahun = date('Y');
        $bulan = date('m');

        for ($i = 1; $i <= $bulan; $i++) {
            $totalPM = Minyak::whereYear('date', $tahun)->whereMonth('date', $i)->Pengeluaran()->sum('amount');
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalPM[] = number_format($totalPM, 0, ',', '.');
        }
        
        return $this->chart->barChart()
            ->addData('Pengeluaran Minyak', $dataTotalPM)
            ->setXAxis($dataBulan);
    }
}
