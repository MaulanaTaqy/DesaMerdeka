<?php

namespace App\Http\Controllers\landingpage;

use Illuminate\Http\Request;
use App\Models\AboutUsBanner;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;

class AboutController extends Controller
{
    public function index()
    {
        $app = AboutUs::first();
        $user = auth()->id();
        $banner = AboutUsBanner::all();
        return view('homepage.content.about-us.index',compact('app','user','banner'));
    }
}
