<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EndEventChart
{
    protected $chart;

    public function __construct(LarapexChart $endEvent)
    {
        $this->chart = $endEvent;
    }

    public function build()
    {

        $currentDate = Carbon::now();
        $monthlyEventCounts = [];
        $monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        for ($month = 1; $month <= 12; $month++) {

            $startOfMonth = $currentDate->copy()->setMonth($month)->startOfMonth();
            $endOfMonth = $currentDate->copy()->setMonth($month)->endOfMonth();
            $eventCount = Event::whereBetween('end_datetime', [$startOfMonth, $endOfMonth])->count();

            $eventCounts['Finished'][] = [
                'x' => $monthNames[$month - 1],
                'y' => $eventCount,
            ];
        }

        return $this->chart->lineChart()
            ->addData('Event Count', $eventCounts['Finished'])
            // ->setWidth(110) 
            ->setHeight(50) 
            ->setSparkline();
    }
}



