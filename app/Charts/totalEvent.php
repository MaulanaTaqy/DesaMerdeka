<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalEvent
{
    protected $chart;

    public function __construct(LarapexChart $totalEvent)
    {
        $this->chart = $totalEvent;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $currentDate = Carbon::now();
        $eventCounts = [
            'Ongoing' => [],
            'Incoming' => [],
            'Finished' => [],
        ];

        $monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = $currentDate->copy()->setMonth($month)->startOfMonth();
            $endOfMonth = $currentDate->copy()->setMonth($month)->endOfMonth();

            // $ongoingEventCount = Event::where('start_datetime', '>=',$startOfMonth)
            //     ->where('end_datetime', '<=', $endOfMonth)
            //     ->count();

            $incomingEventCount = Event::where('start_datetime', '>=', $currentDate)
                ->where('end_datetime', '<=', $endOfMonth)
                ->count();

            $finishedEventCount = Event::whereMonth('end_datetime', $month)->where('end_datetime', '<=', $currentDate)
                ->count();

            // Menggunakan nama bulan sebagai label
            // $eventCounts['Ongoing'][] = [
            //     'x' => $monthNames[$month - 1],
            //     'y' => $ongoingEventCount,
            // ];

            $eventCounts['Incoming'][] = [
                'x' => $monthNames[$month - 1],
                'y' => $incomingEventCount,
            ];

            $eventCounts['Finished'][] = [
                'x' => $monthNames[$month - 1],
                'y' => $finishedEventCount,
            ];
        }

        return $this->chart->lineChart()
            // ->addData('Ongoing Event Count', $eventCounts['Ongoing'])
            ->addData('Finished Event Count', $eventCounts['Finished'])
            ->addData('Incoming Event Count', $eventCounts['Incoming'])
            // ->setWidth(400)
            ->setHeight(200)
            ->setSparkline();
    }
}
