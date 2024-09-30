<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Faq;
use App\Models\AppConfig;
use App\Models\FaqBanner;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $faq = Faq::all();
        $privacyPolicy = PrivacyPolicy::get()->first();
        $termConditions = TermCondition::get()->first();
        $banner = FaqBanner::all();
        
        return view('homepage.content.faq.index',compact('app','faq','user', 'termConditions', 'privacyPolicy','banner'));
    }
}
