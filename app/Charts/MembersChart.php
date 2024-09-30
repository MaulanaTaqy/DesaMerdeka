<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MembersChart
{
    protected $chart;

    public function __construct(LarapexChart $grafikMemberEvent)
    {
        $this->chart = $grafikMemberEvent;
    }




    public function build(): \ArielMejiaDev\LarapexCharts\BarChart 
    {
        $userId = Auth::user()->id;
        $guest = Member::where('user_id', $userId)->first(); 
    
        if (!$guest) {
            return $this->chart->barChart();
        }

        // dd($guest);
    
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
    
        $data = DB::table('events')
            ->where('member_id', $guest->id)
            ->select(
                DB::raw('MONTH(start_datetime) as month'),
                DB::raw('SUM(CASE WHEN is_approved = 1 THEN 1 ELSE 0 END) as approved_count'),
                DB::raw('SUM(CASE WHEN is_approved = 0 THEN 1 ELSE 0 END) as not_approved_count')
            )
            ->whereYear('start_datetime', '=', $currentYear)
            
            ->groupBy('month')
            ->get();
        


            $months = [];

            for ($i = 1; $i <= 12; $i++) {
                $months[] = Carbon::create($currentYear, $i)->format('F');
            }
        
            $approvedData = [];
            $notApprovedData = [];
        
            foreach ($months as $index => $month) {
                $approvedData[] = $data->where('month', $index + 1)->first()->approved_count ?? 0;
                $notApprovedData[] = $data->where('month', $index + 1)->first()->not_approved_count ?? 0;
            }
        
            return $this->chart->barChart()
                ->addData('Approved', $approvedData)
                ->addData('Not Approved', $notApprovedData)
                ->setXAxis($months);
    

    }
}
