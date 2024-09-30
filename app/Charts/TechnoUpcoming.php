<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TechnoUpcoming
{
    protected $chart;

    public function __construct(LarapexChart $technoUpcoming)
    {
        $this->chart = $technoUpcoming;
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

        // $searchMemberByid = Member::where('user_id',(auth()->user()->id))->pluck('id');
        // $data['countTechnoparkSemua']   = $countTechnoparkQuery->where('registered_by_member_id',$searchMemberByid)->count();
        // $data['countTechnopark']        = $countTechnoparkQuery->where('registered_by_member_id',$searchMemberByid)
        //                                         ->whereDoesntHave('user', function ($query) {
        //                                             $query->permission('approved');
        //                                         })->count();
    
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $currentDate = Carbon::now()->day;

        $data = Event::with(['category.meta_name', 'event_speaker.speaker', 'event_sponsor.sponsor', 'member']);

        if (getRoleName() == 'member') {
            $data = $data->where('member_id', auth()->user()->member->id)
                ->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }
        
        
        $data = $data->whereYear('start_datetime', $currentYear)
        ->where('start_datetime', '>', now())
        ->select(
            DB::raw('MONTH(end_datetime) as month'),
            DB::raw('COUNT(id) as count') 
        )->groupBy(DB::raw('MONTH(end_datetime)'))
        ->orderBy(DB::raw('MONTH(end_datetime)'))
        ->get();

        $guestCountData = [];
        $monthLabels = [];

    
        $numMonthsToShow = 12;

        for ($i = 0; $i < $numMonthsToShow; $i++) {
            $targetMonth = ($currentMonth + $i) % 12;
            if ($targetMonth == 0) {
                $targetMonth = 12;
                $currentYear++; 
            }
 
            if ($targetMonth == 12 && $i > 0) {
                break;
            }
        
   
            $eventsEndingThisMonth = Event::whereYear('end_datetime', '=', $currentYear)
                ->whereMonth('end_datetime', '=', $targetMonth)
                ->whereDay('end_datetime', '>=', $currentDate)
                ->count();
        
            $guestCountData[] = $eventsEndingThisMonth;
            $monthLabels[] = date('F', mktime(0, 0, 0, $targetMonth, 1));
        }
        

        

        return $this->chart->lineChart()
            ->addData('Event End', $guestCountData)
            ->setXAxis($monthLabels)
            ->setWidth(110)
            ->setHeight(50)
            ->setSparkline();

        }
}