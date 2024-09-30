<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use App\Models\AppConfig;
use App\Models\DeveloperNote;
use App\Models\Roadmap;
use App\Models\RoadmapBanner;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function index()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $roadmap = Roadmap::orderBy('created_at','ASC')->get();
        $note = DeveloperNote::first();
        $banner = RoadmapBanner::all();
        return view('landing-page.roadmap',compact('app','user','roadmap','banner', 'note'));
    }
}
