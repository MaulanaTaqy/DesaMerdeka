<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TechnoTotal
{
    protected $chart;

    public function __construct(LarapexChart $technoTotal)
    {
        $this->chart = $technoTotal;
    }

    public function build(): LineChart
    {
        $userId = Auth::user()->id;
        $guest = Member::where('user_id', $userId)->first();
    
        if (!$guest) {
            return $this->chart->lineChart()
                ->setWidth(110)
                ->setHeight(50)
                ->setSparkline();
        }
    
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $currentDate = Carbon::now()->day;
    
        $eventQuery = Event::query();
    
        if (getRoleName() == 'member') {
            $eventQuery = $eventQuery->where('member_id', auth()->user()->member->id)
                ->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }
        $data = $eventQuery->whereYear('start_datetime', $currentYear)
        ->where('end_datetime', '<', now())        
        ->select(
            DB::raw('MONTH(end_datetime) as month'),
            DB::raw('COUNT(id) as count') 
        )->groupBy(DB::raw('MONTH(end_datetime)'))
        ->orderBy(DB::raw('MONTH(end_datetime)'))
        ->get();
    
    
        $upcomingData = $eventQuery->whereYear('start_datetime', $currentYear)
            ->where('start_datetime', '>', now())
            ->select(
                DB::raw('MONTH(start_datetime) as month'),
                DB::raw('COUNT(id) as count')
            )
            ->groupBy(DB::raw('MONTH(start_datetime)'))
            ->orderBy(DB::raw('MONTH(start_datetime)'))
            ->get();
    
        $guestCountData = [];
        $upcomingCountData = [];
        $monthLabels = [];
        
        for ($month = 1; $month < $currentMonth; $month++) {
            $upcomingCountData[] = 0;
            $monthLabels[] = date('F', mktime(0, 0, 0, $month, 1));
        }
            
            
    
        for ($month = $currentMonth; $month <= 12; $month++) {
            $upcomingCount = 0;
    
            foreach ($upcomingData as $row) {
                if ($row->month == $month) {
                    $upcomingCount += $row->count;
                }
            }
    
            $upcomingCountData[] = $upcomingCount;
            $monthLabels[] = date('F', mktime(0, 0, 0, $month, 1));
        }
    
     
        $guestCountData = [];
        $monthLabels = [];
        for ($month = 1; $month <= $currentMonth; $month++) {
            $found = false;
    
            foreach ($data as $row) {
                if ($row->month == $month) {
                    $guestCountData[] = $row->count;
                    $monthLabels[] = date('F', mktime(0, 0, 0, $row->month, 1));
                    $found = true;
                    break;
                }
            }
    
            if (!$found) {
                $guestCountData[] = 0; 
                $monthLabels[] = date('F', mktime(0, 0, 0, $month, 1));
            }
        }
    
        return $this->chart->lineChart()
            ->addData('Event End', $guestCountData)
            ->addData('Upcoming Events', $upcomingCountData)
            ->setColors(['#ff5733', '#33ff57']) 
            ->setXAxis($monthLabels)
            ->setWidth(400)
            ->setHeight(200)
            ->setSparkline();
    }
    
}
