<?php

namespace App\Charts;

use App\Models\Batubara;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class EstimasitonaseChart
{
    protected $Echart;

    public function __construct(LarapexChart $Echart)
    {
        $this->Echart = $Echart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');

        for ($i = 1; $i <= $bulan; $i++) {
            $totalET = Batubara::whereYear('date', $tahun)->whereMonth('date', $i)->sum('estimasi_tonase');
            $dataBulan[] = Carbon::create()->month($i)->format('F');;
            $dataTotalET[] = number_format($totalET, 2, ',', '.');
        }
        // dd($dataBulan);
        return $this->Echart->lineChart()
            ->addData('Estimasi Tonase', $dataTotalET)
            ->setXAxis($dataBulan);
    }
}
