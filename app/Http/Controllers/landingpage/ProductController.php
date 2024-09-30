<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Member;
use App\Models\Product;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\AppConfig;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\ProductBanner;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $event = Product::get();
        $banner = ProductBanner::all();
        return view('landing-page.product.index', compact('event','app','user','banner'));
    }
    public function detail()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        return view('landing-page.product.detail',compact('app','user'));
    }

    public function show($id)
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $member = Product::with(['member_type'])->find($id);
        $product = Product::where('member_id', $id)->get();
        $team = TeamMember::where('member_id', $id)->get();
        $event = Event::with(['category.meta_name'])->where('member_id', $id)->get();
        $blog = Blog::with(['category.meta_name', 'member'])->where('member_id', $id)->get();
        $sponsor = Sponsor::where('member_id', $id)->get();
        $product = Product::find($id);
        $speaker = Speaker::first();
        $gambar = Speaker::all();
        $skipped = $gambar->skip(1);
        // dd($speaker);
        // $speaker = Speaker::where('member_id', $id)->get();


        
        return view('landing-page.product.detail', compact('app','member','user', 'product', 'team', 'event', 'blog', 'sponsor','product','speaker','gambar','skipped'));
    }
}
