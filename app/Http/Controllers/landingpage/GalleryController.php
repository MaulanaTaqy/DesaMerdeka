<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Member;
use App\Models\Gallery;
use App\Models\AppConfig;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use App\Models\GalleryBanner;
use App\Models\GalleryCategory;
use App\Models\MetaGalleryCategory;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index($id = 'all')
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $categories = MetaGalleryCategory::get();
        $gallery = Gallery::with(['category.meta_name','admin', 'member'])->where('admin_id', '!=', null)->orderBy('updated_at','DESC');
        $data["id"] = "all";
        if($id != 'all'){
            $galleryIds = GalleryCategory::where('meta_gallery_category_id', $id)->pluck('gallery_id');
            $gallery = $gallery->whereIn('id', $galleryIds);
            $data["id"] = $id;
        }
        $gallery = $gallery->paginate(6);
        $banner = GalleryBanner::all();
        
        return view("homepage.content.gallery.index", $data, compact('categories', 'gallery','app','user','banner'));
    }
    public function show($id)
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $gallery = GalleryImage::with('gallery')->where('gallery_id', $id)->get();
        $galleryVideo = GalleryVideo::with('gallery')->where('gallery_id', $id)->get();

        return view('homepage.content.gallery.detail',compact('app','user', 'gallery', 'galleryVideo'));
    }

    public function indexMember($id = 'all', $member_id)
    {
        // dd($id);
        $app = AppConfig::first();
        $user = auth()->id();
        $categories = MetaGalleryCategory::get();
        $gallery = Gallery::where('member_id', $member_id)->with(['category.meta_name','admin', 'member'])->orderBy('updated_at','DESC');
    
        if($id != 'all'){
            $galleryIds = GalleryCategory::where('meta_gallery_category_id', $id)->pluck('gallery_id');
            $gallery = $gallery->whereIn('id', $galleryIds);
        }
        $gallery = $gallery->paginate(6);
        
        return view('landing-page.gallery-member.index', compact('categories', 'gallery','app','user'));
    }
    public function showMember($id)
    {
        // dd($id);
        $app = AppConfig::first();
        $user = auth()->id();
        $gallery = GalleryImage::with('gallery')->where('gallery_id', $id)->get();
        $galleryVideo = GalleryVideo::with('gallery')->where('gallery_id', $id)->get();
    
        return view('landing-page.gallery-member.detail',compact('app','user', 'gallery', 'galleryVideo'));
    }

    public function createdBy($id){
        $app = AppConfig::first();
        $member = Member::find($id);
        $categories = MetaGalleryCategory::get();
        $gallery = Gallery::with(['category.meta_name','admin'])->where('admin_id',$id)->orWhere('member_id', $id)->orderBy('created_at','DESC')->paginate(12);
        return view('landing-page.gallery.created-by', compact('app','gallery','categories','member'));
    }
}