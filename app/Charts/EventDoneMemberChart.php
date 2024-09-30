<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class EventDoneMemberChart
{
    protected $chart;

    public function __construct(LarapexChart $doneEvent)
    {
        $this->chart = $doneEvent;
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
    
        // dd($guest);
    
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
    
        $data = DB::table('events')
            ->where('member_id', $guest->id)
            ->whereYear('start_datetime', $currentYear)
            ->where('end_datetime', '<', now())
            ->select(DB::raw('MONTH(end_datetime) as month'), DB::raw('CAST(COUNT(member_id) AS SIGNED) as count'))
            ->groupBy(DB::raw('MONTH(end_datetime)'))
            ->orderBy(DB::raw('MONTH(end_datetime)'))
            ->get();
        // dd($data);
    
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
            ->addData('onGoing Event', $guestCountData)
            ->setXAxis($monthLabels)
            ->setWidth(110)
            ->setHeight(50)
            ->setSparkline();
    }
    
}
