<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EventNowChart
{
    protected $chart;

    public function __construct(LarapexChart $nowEvent)
    {
        $this->chart = $nowEvent;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $currentDate = Carbon::now();
        $ongoingEventCounts = [];

        for ($month = 1; $month <= $currentDate->month; $month++) {
            $startOfMonth = $currentDate->copy()->setMonth($month)->startOfMonth();
            $endOfMonth = $currentDate->copy()->setMonth($month)->endOfMonth();

            $eventCount = Event::where('start_datetime', '>=', $startOfMonth)
                ->where('end_datetime', '<=', $endOfMonth)
                ->count();

            $ongoingEventCounts[] = $eventCount;
        }

        return $this->chart->lineChart()
            ->addData('Ongoing Event Count', $ongoingEventCounts)
            ->setWidth(110)
            ->setHeight(50)
            ->setSparkline();
    }
}




