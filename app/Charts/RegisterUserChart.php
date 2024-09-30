<?php

namespace App\Charts;

use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class RegisterUserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $currentYear = Carbon::now()->format('Y');
        $currentMonth = Carbon::now()->format('m');
        $months = [];
        $userCounts = [];

        for ($month = 1; $month <= 12; $month++) {
            $userData = User::select(
                DB::raw('DATE_FORMAT(created_at, "%M") as month'),
                DB::raw('COUNT(*) as total_users')
            )
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $month)
            ->groupBy('month')
            ->first();

            $months[] = Carbon::createFromDate($currentYear, $month, 1)->format('F');
            $userCounts[] = $userData ? $userData->total_users : 0;
        }

        return $this->chart->lineChart()
            ->addData('User Registrations', $userCounts)
            ->setXAxis($months);
    }
}
