<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TechnoEventEnd
{
    protected $chart;

    public function __construct(LarapexChart $technoParkDone)
    {
        $this->chart = $technoParkDone;
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

        $data = Event::with(['category.meta_name', 'event_speaker.speaker', 'event_sponsor.sponsor', 'member']);

        if (getRoleName() == 'member') {
            $data = $data->where('member_id', auth()->user()->member->id)
                        ->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }

        // Sekarang, kita akan menambahkan kondisi tambahan untuk tanggal "end_datetime".
        $data = $data->whereYear('start_datetime', $currentYear)
        ->where('end_datetime', '<', now())
        ->select(
            DB::raw('MONTH(end_datetime) as month'),
            DB::raw('COUNT(id) as count') 
        )->groupBy(DB::raw('MONTH(end_datetime)'))
        ->orderBy(DB::raw('MONTH(end_datetime)'))
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
            ->addData('Event End', $guestCountData)
            ->setXAxis($monthLabels)
            ->setWidth(110)
            ->setHeight(50)
            ->setSparkline();
    
}
}