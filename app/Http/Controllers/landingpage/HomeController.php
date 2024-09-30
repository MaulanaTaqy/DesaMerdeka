<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Blog;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Member;
use App\Models\Product;
use App\Models\Sponsor;
use App\Models\AppConfig;
use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use App\Models\MetaMemberCategory;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\MetaEventCategory;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        // dd($user);
        $member = Member::permission('approved')->select('members.*','member_types.name as type_name')
                ->join('member_types', 'member_types.id', '=', 'members.member_type_id')
                ->get();
        // $video = VideoModel::find(4);
        
        $category_id = MetaBlogCategory::where("name", "Lowongan Kerja")
            ->where("is_approved", 1)
            ->first();

        $category_id = $category_id->id ?? '';
        
        $lowongan = BlogCategory::where("meta_blog_category_id", $category_id)
            ->limit(4)
            ->orderBy("created_at", "DESC")
            ->get();
        
        $blogFilter = $lowongan->pluck('blog_id');
        $blog = Blog::with(['admin', 'member', 'category.meta_name'])->where('is_approved', 1)->orderBy('created_at','DESC')->whereNotIn('id', $blogFilter)->limit(8)->get();
        
        $event = Event::with(['admin', 'member','category.meta_name', 'event_speaker.speaker'])->where('is_approved', 1)->orderBy('created_at','DESC')->limit(5)->get();

        $tanggal_sekarang = now();
        $next_event = Event::with(['admin', 'member','category.meta_name', 'event_speaker.speaker'])
            ->where('is_approved', 1)
            ->whereDate("start_datetime", ">=", $tanggal_sekarang)
            ->orderBy('created_at','ASC')
            ->limit(5)
            ->get();

        $product = Product::with(['admin'])->orderBy('created_at','DESC')->where('is_approved', 1)->limit(8)->get();

        $sponsor = Sponsor::where('is_showed', true)
            ->where('is_approved', true)
            ->orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();
             
        //count industri
        // $komunitas_id = MemberType::where('name','Komunitas')->first();
        $industri_id = MemberType::where('name','Industri')->first();
        $industri_id = $industri_id->id ?? '';
        $industri = Member::with(['member_type', 'user'])->whereHas('user', function($q){
            $q->permission('approved');
        })->where('member_type_id',$industri_id)->count();
        
        //count komunitas asosiasi
        // $komunitas_id = MemberType::where('name','Asosiasi')->first();
        $komunitas_id = MemberType::where('name','Komunitas/Asosiasi')->first();
        $komunitas_id = $komunitas_id->id ?? '';
        $komunitas = Member::with(['member_type', 'user'])->whereHas('user', function($q){
            $q->permission('approved');
        })->where('member_type_id',$komunitas_id)->count();
        
        //count desa
        // $technopark_id = MemberType::where('name','Technopark')->first();
        $desa_id = MemberType::where('name','Desa')->first();
        $desa_id = $desa_id->id ?? '';
        $desa = Member::with(['member_type', 'user'])->whereHas('user', function($q){
            $q->permission('approved');
        })->where('member_type_id',$desa_id)->count();
        
        //count umkm
        // $startup_id = MemberType::where('name','Startup')->first();
        $umkm_id = MemberType::where('name','UMKM')->first();
        $umkm_id = $umkm_id->id ?? '';
        $umkm = Member::with(['member_type', 'user'])->whereHas('user', function($q){
            $q->permission('approved');
        })->where('member_type_id',$umkm_id)->count();

        //count event
        $event_count = Event::count();
        //count product
        $product_count = Product::count();

        //layanan dan solusi
        $member_category_count = MetaMemberCategory::count();
        //count guest
        $guest_count = Guest::count();
        
        $member_type = MemberType::get();

        $member_data = Member::where("is_showed", 1)->limit(6)->get();

        // $meta_blog = MetaBlogCategory::where("is_approved", 1)->paginate(5);

        $count = [
            "c_produk" => Product::where("is_approved", 1)->count(),
            "c_users" => User::role('member')->permission('approved')->count() + User::role('guest')->count()
        ];

        return view('homepage.content.home.index', $count, compact('member_type', 'app','blog','event','product','sponsor','user','industri','komunitas','desa','umkm','event_count','product_count','guest_count','member_category_count', 'member_data', "lowongan", "next_event"));
    }
    public function map_virtual()
    {
        $data['app'] = AppConfig::first();
        $data['user'] = auth()->id();

        // $data['umkm'] = MemberType::where('name', 'Startup')->first();
        $data['umkm'] = MemberType::where('name', 'UMKM')->first();
        // $data['community'] = MemberType::where('name', 'Komunitas')->first();
        $data['industri'] = MemberType::where('name', 'Industri')->first();
        // $data['asociation'] = MemberType::where('name', 'Asosiasi')->first();
        $data['komunitas'] = MemberType::where('name', 'Komunitas/Asosiasi')->first();

        $data['desa'] = Member::where('name', 'Rice Bandung')->first();
        $data['btp'] = Member::where('name', 'Bandung Techno Park')->first();
        $data['ibc'] = Member::where('name', 'IBC Semarang')->first();
        $data['bcic'] = Member::where('name', 'BDI Denpasar')->first();
        // dd($desa);
        // $video = VideoModel::find(4);
        return view('landing-page.map-virtual', $data);
    }

    public function detail_partner($id_partner)
    {
        $data = [
            "app" => AppConfig::first(),
            "sponsor" => Sponsor::where("id", $id_partner)->first()
        ];

        return view("homepage.content.partner.detail", $data);
    }
}
