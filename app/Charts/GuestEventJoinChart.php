<?php

namespace App\Charts;

use App\Models\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class GuestEventJoinChart
{
    protected $chart;

    public function __construct(LarapexChart $guestEvent)
    {
        $this->chart = $guestEvent;
    }
    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $userId = Auth::user()->id;
        $guest = Guest::where('user_id', $userId)->first(); 
    
        if (!$guest) {
            return $this->chart->lineChart();
        }
    
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
    
        $data = DB::table('guest_events')
            ->where('guest_id', $guest->id)
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', '<=', $currentMonth) 
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('CAST(COUNT(guest_id) AS SIGNED) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

    
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
            ->addData('Jumlah Guest yang Mengikuti Event', $guestCountData)
            ->setXAxis($monthLabels);
    }
    
}
