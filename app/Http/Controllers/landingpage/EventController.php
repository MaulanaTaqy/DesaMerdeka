<?php

namespace App\Http\Controllers\landingpage;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Member;
use App\Models\Speaker;
use App\Models\AppConfig;
use App\Models\MemberType;
use App\Models\EventBanner;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use App\Models\HomeEventBanner;
use App\Models\MetaEventCategory;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(Request $request, $id = 'all', $tags = null)
    {
        // dd($tags);
        $app = AppConfig::first();
        $user = auth()->id();
        $event = MetaEventCategory::get();
        $blogs = Blog::orderBy('created_at', 'DESC')->limit(3)->get();
        $memberType = MemberType::get();

        $year = Event::select("created_at")->get();
        $yearGrouped = $year->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format("Y");
        });
        $allEvent = Event::with(['admin', 'member','category.meta_name', 'event_speaker.speaker'])->where('is_approved', 1)->orderBy('created_at','DESC');

        if($request->search){
            $member = $allEvent->where('title', 'LIKE', '%'.$request->search.'%');
        }
        if($id != 'all'){
            $eventIds = EventCategory::where('meta_event_category_id', $id)->pluck('event_id');
            $allEvent = $allEvent->whereIn('id', $eventIds);
        }
        if ($request->y) {
            $allEvent->whereYear('created_at', $request->y);
        }
        if ($tags && $id != 'all') {
            $allEvent->where('member_type_id', $tags);
        }
        $count = $allEvent->count();
        $allEvent = $allEvent->paginate(7);
        $banner = HomeEventBanner::all();

        return view('homepage.content.event.index', compact('allEvent', 'yearGrouped', 'memberType','event','app','blogs' ,'count','user','banner'));
    }
    public function detail($id)
    {
        $categories = MetaEventCategory::get();
        $allEvent = Event::with(['admin', 'member','category.meta_name', 'event_speaker.speaker'])->where('is_approved', 1)->orderBy('created_at','DESC')->get();
        $app = AppConfig::first();
        $user = auth()->id();
        $event = Event::with(['admin', 'member', 'member_type','event_sponsor.sponsor','event_speaker.speaker','images'])->find($id);
        
        return view('homepage.content.event.detail',compact('app','user','event', 'allEvent', 'categories'));
    }

    public function createdBy($id){
        $app = AppConfig::first();
        $member = Member::find($id);
        $categories = MetaEventCategory::get();
        $event = Event::with(['category.meta_name','admin'])->where('admin_id',$id)->orWhere('member_id', $id)->where('is_approved', 1)->orderBy('created_at','DESC')->paginate(6);
        
        return view('homepage.content.event.created-by', compact('app','event','categories','member'));
    }
}
