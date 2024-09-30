<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalSemuaEventMemberChart
{
    protected $chart;

    public function __construct(LarapexChart $totalEventMembers)
    {
        $this->chart = $totalEventMembers;
    }

    public function build(): LineChart
    {
        $userId = Auth::user()->id;
        $guest = Member::where('user_id', $userId)->first();

        if (!$guest) {
            return $this->chart->lineChart()
                ->setHeight(50)
                ->setSparkline();
        }

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

     
        $data = DB::table('events')
            ->where('member_id', $guest->id)
            ->whereYear('start_datetime', $currentYear)
            ->select(DB::raw('MONTH(start_datetime) as month'), DB::raw('CAST(COUNT(member_id) AS SIGNED) as count'))
            ->groupBy(DB::raw('MONTH(start_datetime)'))
            ->orderBy(DB::raw('MONTH(start_datetime)'))
            ->get();

        $ongoingCountData = [];
        $endedCountData = [];
        $upcomingCountData = [];
        $monthLabels = [];
        for ($month = 1; $month <= 12; $month++) {
            $found = false;

            foreach ($data as $row) {
                $currentDate = Carbon::now()->toDateString();
                if ($row->month == $month) {
                    $monthLabels[] = date('F', mktime(0, 0, 0, $row->month, 1));
                    $found = true;

                    if ($month < $currentMonth) {
                        // Ended events
                        $endedCountData[] = $row->count;
                        $upcomingCountData[] = 0;
                    } else {
                        // Upcoming events
                        $endedCountData[] = 0;
                        $upcomingCountData[] = $row->count;
                    }
                    

                    break;
                }
            }

            if (!$found) {
                $monthLabels[] = date('F', mktime(0, 0, 0, $month, 1));
                $endedCountData[] = 0;
                $upcomingCountData[] = 0;
               
            }
            
        }

        return $this->chart->lineChart()
            ->addData('Ended Event', $endedCountData)
            ->addData('Upcoming Event', $upcomingCountData)
            ->setHeight(200)
            ->setSparkline();
    }
}
