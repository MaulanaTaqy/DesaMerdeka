<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EventUpComingChart
{
    protected $chart;

    public function __construct(LarapexChart $incomingEvent)
    {
        $this->chart = $incomingEvent;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $currentDate = Carbon::now();
        $ongoingEventCounts = [];

        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = $currentDate->copy()->setMonth($month)->startOfMonth();
            $endOfMonth = $currentDate->copy()->setMonth($month)->endOfMonth();

            $eventCount = Event::where('start_datetime', '>=', $currentDate) // Ubah ini
                ->where('end_datetime', '<=', $endOfMonth)
                ->count();

            $ongoingEventCounts[] = $eventCount;
        }

        return $this->chart->lineChart()
            ->addData('Ongoing Event Count', $ongoingEventCounts)
            // ->setWidth(110)
            ->setHeight(50)
            ->setSparkline();
    }
}


