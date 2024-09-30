<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Event;
use App\Models\Member;
use App\Models\AppConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function index(Request $request, $id = 'all')
    {
        $app = AppConfig::first();
        $user = auth()->user();
        $event = Event::with(['member_type','event_sponsor.sponsor','event_speaker.speaker','event_banner'])->find($id);

        $member = Member::select('members.*','member_types.name as type_name')
        ->join('member_types', 'member_types.id', '=', 'members.member_type_id')
        ->get();
        
        return view('landing-page.regiter',compact('app','user','event','member'));
    }
}

