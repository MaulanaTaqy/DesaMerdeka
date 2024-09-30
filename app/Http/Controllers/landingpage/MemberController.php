<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Member;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\AppConfig;
use App\Models\MemberType;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\MemberCategory;
use App\Models\MemberTypeBanner;
use App\Models\MetaMemberCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(Request $request, $id = 'all')
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $member_type = MemberType::where('name','!=','Kemenprim')->get();
        $member = Member::with(['member_type', 'user'])->whereHas('user', function($q){
            $q->permission('approved');
        });
        
        
        if($request->search){
            $member = $member->where('name', 'LIKE', '%'.$request->search.'%');
        }
        if($id != 'all'){
            $member = $member->where('member_type_id', $id);
        }
        $count = $member->count();
        
        $member = $member->paginate(12);
        $banner = MemberTypeBanner::all();

        $upcomingEvent = Event::where('start_datetime', '>=' , now())->limit(3)->get();
        $blogs = Blog::orderBy('created_at', 'DESC')->limit(3)->get();
        
        return view('homepage.content.member.index', compact('member', 'blogs', 'upcomingEvent', 'member_type','app','user','banner', 'count'));
    }

    public function show($id)
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $member = Member::with(['member_type', 'user'])->find($id);
        $banner = MemberTypeBanner::all();
        $product = Product::where('member_id', $id)->where('is_approved', 1)->limit(6)->get();
        $team = TeamMember::where('member_id', $id)->get();
        $event = Event::with(['category.meta_name'])->where('is_approved', 1)->where('member_id', $id)->orderBy('created_at', 'DESC')->limit(6)->get();
        $blog = Blog::with(['category.meta_name', 'member', 'admin'])->where('is_approved', 1)->where('member_id', $id)->orderBy('created_at', 'DESC')->limit(8)->get();
        $sponsor = Sponsor::where('member_id', $id)->get();
        $service = Service::where('member_id', $id)->limit(8)->get();
        // $gallery = Gallery::where('member_id', $id)->limit(6)->orderBy('updated_at', 'DESC')->get();
        $gallery = Gallery::with('category.meta_name', 'images', 'videos')
        ->where('member_id', $id)
        ->limit(6)
        ->orderBy('updated_at', 'DESC')
        ->get();
    

        // $umkm = Member::where('registered_by_member_id', $member->id)->where('member_type_id', MemberType::where('name', 'Startup')->first()->id)->get();
        $umkm = Member::where('registered_by_member_id', $member->id)->where('member_type_id', MemberType::where('name', 'UMKM')->first()->id)->get();
        
        $counter['umkm'] = 0;
        $counter['service'] = 0;
        $counter['product'] = 0;
        $counter['news'] = 0;
        $counter['event'] = 0;

        if($member->member_type->name == 'Desa'){
            // $counter['umkm'] = Member::where('registered_by_member_id', $member->id)->where('member_type_id', MemberType::where('name', 'Startup')->first()->id)->count();
            $counter['umkm'] = Member::where('registered_by_member_id', $member->id)->where('member_type_id', MemberType::where('name', 'UMKM')->first()->id)->count();
            $counter['service'] = Service::where('member_id', $member->id)->count();
            $counter['product'] = Product::where('member_id', $member->id)->count();
            $counter['news'] = Blog::where('member_id', $member->id)->count();
            $counter['event'] = Event::where('member_id', $member->id)->count();

        }
        // dd($umkm);
        return view('homepage.content.member.detail', compact('app', 'umkm', 'counter','gallery', 'banner','member','user', 'product', 'team', 'event', 'blog', 'sponsor','service'));
    }
}
