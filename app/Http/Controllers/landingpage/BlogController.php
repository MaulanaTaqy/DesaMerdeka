<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Blog;
use App\Models\Member;
use App\Models\AppConfig;
use App\Models\BlogBanner;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index($id = 'all')
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $categories = MetaBlogCategory::get();
        $recent = Blog::orderBy('created_at','DESC')
            ->where('is_approved',1)
            ->orderBy('updated_at','DESC')
            ->limit(5);

        $data["blog"] = Blog::with(['category.meta_name','admin', 'member'])->where('is_approved',1)->orderBy('updated_at','DESC');

        if($id != 'all'){
            $data["id"] = $id;
            $blogIds = BlogCategory::where('meta_blog_category_id', $id)->pluck('blog_id');
            $data["blog"] = $data["blog"]->whereIn('id', $blogIds)->orWhere('member_type_id', $id);
        }
        $data["blog"] = $data["blog"]->paginate(10);
        $banner = BlogBanner::all();
        
        $blogs = $recent->get();

        return view('homepage.content.blog.index', $data, compact('categories', "blogs",'app','recent','user','banner'));
    }

    public function detail($id)
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $categories = MetaBlogCategory::get();
        $blog = Blog::with(['category.meta_name','admin'])->find($id);
        $recent = Blog::orderBy('created_at','DESC')
            ->where('id', '!=', $id)
            ->limit(3);
        // dd($blog);
        $blogs = $recent->get();
        return view('homepage.content.blog.detail', compact('app','blog', 'blogs','categories','recent','user'));
    }

    public function createdBy($id){
        $app = AppConfig::first();
        $member = Member::find($id);
        $categories = MetaBlogCategory::get();
        $blog = Blog::with(['category.meta_name','admin'])->where('admin_id',$id)->orWhere('member_id', $id)->where('is_approved', 1)->orderBy('created_at','DESC')->paginate(12);
        return view("homepage.content.blog.create-by", compact("app", "blog", "categories", "member"));
        // return view('landing-page.blog.created-by', compact('app','blog','categories','member'));
    }
}
