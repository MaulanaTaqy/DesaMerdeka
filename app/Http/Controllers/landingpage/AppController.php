<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Member;
use App\Models\Product;
use App\Models\AppConfig;
use Illuminate\Http\Request;
use App\Models\ProductBanner;
use App\Models\ProductCategory;
use App\Models\MetaEventCategory;
use App\Models\MetaProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function index(Request $request, $id = 'all')
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $categories = MetaProductCategory::get();
        $product = Product::with(['admin', 'category.meta_name'])->where('is_approved', 1)->orderBy('created_at','DESC');
        $banner = ProductBanner::all();

        if($request->search){
            $member = $product->where('title', 'LIKE', '%'.$request->search.'%');
        }

        if($id != 'all'){
            $productIds = ProductCategory::where('meta_product_category_id', $id)->pluck('product_id');
            $product = $product->whereIn('id', $productIds);
        }
        
        $count = $product->count();

        $product = $product->paginate(12);

        return view('landing-page.app.index',compact('categories','product','app','user','banner', 'count'));
    }

    public function show($id)
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $categories = MetaProductCategory::get();
        
        $product = Product::with(['admin', 'member', 'category.meta_name','images'])->where('is_approved', 1)->find($id);
        $latest = Product::latest()->where('id' , '!=' , $id)->where('is_approved', 1)->limit(5)->get();
        
        return view('landing-page.app.detail',compact('categories','app','user','product','latest'));
    }

    public function sendMessage(Request $request)
    {
        $product =  Product::with(['admin', 'member'])->find($request->id);

        try {
            Mail::send('mail.product-contact', ['product' => $product, 'request' => $request], function($mail) use($product, $request) {
                $mail->subject('Message From Product '. $product->title .' Contact box!');
                $mail->to($product->member->user->email);
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return 'Berhasil mengirim pesan, terimakasih!';
    }

    public function createdBy($id){
        $app = AppConfig::first();
        $member = Member::find($id);
        $categories = MetaEventCategory::get();
        $product = Product::with(['category.meta_name','admin'])->where('admin_id',$id)->orWhere('member_id', $id)->where('is_approved', 1)->orderBy('created_at','DESC')->paginate(12);
        
        return view('landing-page.app.created_by', compact('app','product','categories','member'));
    }
}
