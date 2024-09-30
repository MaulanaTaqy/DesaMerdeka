<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TechnoparkChart
{
    protected $chart;

    public function __construct(LarapexChart $technoBar)
    {
        $this->chart = $technoBar;
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

        $data = Event::with(['member']);
        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id)->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }
        $data = $data->select(
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
