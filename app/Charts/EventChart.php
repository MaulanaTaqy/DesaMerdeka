<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventChart
{
    protected $chart;

    public function __construct(LarapexChart $grafik)
    {
        $this->chart = $grafik;
    }

public function build(): \ArielMejiaDev\LarapexCharts\BarChart
{
    $currentYear = Carbon::now()->year;
    $currentMonth = Carbon::now()->month;

    $eventData = DB::table('events')
        ->select(
            DB::raw('MONTH(start_datetime) as month'),
            DB::raw('SUM(CASE WHEN is_approved = 1 THEN 1 ELSE 0 END) as approved_count'),
            DB::raw('SUM(CASE WHEN is_approved = 0 THEN 1 ELSE 0 END) as not_approved_count')
        )
        ->whereYear('start_datetime', '=', $currentYear)
        ->whereMonth('start_datetime', '<=', $currentMonth)
        ->groupBy('month')
        ->get();

    $months = [];

    for ($i = 1; $i <= 12; $i++) {
        $months[] = Carbon::create($currentYear, $i)->format('F');
    }

    $approvedData = [];
    $notApprovedData = [];

    foreach ($months as $index => $month) {
        $approvedData[] = $eventData->where('month', $index + 1)->first()->approved_count ?? 0;
        $notApprovedData[] = $eventData->where('month', $index + 1)->first()->not_approved_count ?? 0;
    }

    return $this->chart->barChart()
        ->addData('Approved', $approvedData)
        ->addData('Not Approved', $notApprovedData)
        ->setXAxis($months);
}


}
