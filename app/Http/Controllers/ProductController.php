<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\MemberType;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Models\MetaProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $categories = MetaProductCategory::get();
        return view('adminpage.content.product.index', compact('categories'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('adminpage.content.product.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'desc'              => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png,webp,svg',
            'video_banner'      => 'image|mimes:jpeg,jpg,png,webp,svg',
            'banner_image.*'    => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $path = 'files/product/image/';
            
    
            if($request->file('image')){
                $file = $request->file('image');
                $thumbnailImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$thumbnailImageFileName];
            }else{
                $image = [];
            }
            
            if($request->file('banner_image')){
                $file = $request->file('banner_image');
                $bannerImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $bannerImage = ['banner_image'=> $path.$bannerImageFileName];
            }else{
                $bannerImage = [];
            }

            if($request->file('video_banner')){
                $file = $request->file('video_banner');
                $videoBannerFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $videoBanner = ['video_banner'=> $path.$videoBannerFileName];
            }else{
                $videoBanner = [];
            }

            $product = Product::updateOrCreate(
                [ 'id' => $request->id ],
                [
                    'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                    'admin_id'          => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
                    'member_type_id'    => getRoleName() == 'admin' ? MemberType::where('name', 'Kemenprim')->first()->id : Auth::user()->member->member_type_id,
                    'title'             => $request->title,
                    'desc'              => $request->desc,
                    'market_store_url'  => $request->market_store_url,
                    'fb_url'            => $request->fb_url,
                    'ig_url'            => $request->ig_url,
                    'yt_url'            => $request->yt_url,
                    'tk_url'            => $request->tk_url,
                    'video'             => $request->video,
                    'is_hki'            => $request->is_hki ? true : false,
                    'is_approved'       => isAutoApprove(),
                ]+$image+$bannerImage+$videoBanner
            );
            
            foreach(($request->category_id ?? []) as $item){
                ProductCategory::create([
                    'product_id'               => $product->id,
                    'meta_product_category_id' => $item
                ]);
            }
            
            foreach($request->file('product_image') ?? [] as $key => $item){
                $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                ProductImage::create([
                    'product_id'      => $product->id,
                    'image'         => $path.$fileName[$key]
                ]);
            }
            
            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('product_image') as $key => $file){
                    $file->move($path, $fileName[$key]);
                }
                if($request->file('image')) $request->file('image')->move($path, $thumbnailImageFileName);
                if($request->file('banner_image')) $request->file('banner_image')->move($path, $bannerImageFileName);
                if($request->file('video_banner')) $request->file('video_banner')->move($path, $videoBannerFileName);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('product.index')->with('success', 'Success Create Product!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['product'] = Product::with(['category.meta_name', 'images'])->find($id);

        return view('adminpage.content.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'desc'              => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png,webp,svg',
            'video_banner'      => 'image|mimes:jpeg,jpg,png,webp,svg',
            'banner_image.*'      => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->with('error', $validator->errors()->first())
                        ->withInput();
        }

        try {

            DB::beginTransaction();

            $path = 'files/product/image/';
            
            if($request->file('image')){
                $file = $request->file('image');
                $thumbnailImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$thumbnailImageFileName];
            }else{
                $image = [];
            }

            if($request->file('banner_image')){
                $file = $request->file('banner_image');
                $bannerImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $bannerImage = ['banner_image'=> $path.$bannerImageFileName];
            }else{
                $bannerImage = [];
            }

            if($request->file('video_banner')){
                $file = $request->file('video_banner');
                $videoBannerFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $videoBanner = ['video_banner'=> $path.$videoBannerFileName];
            }else{
                $videoBanner = [];
            }

            $product = Product::find($id);
            $product->update(
                [
                    'title'             => $request->title,
                    'desc'              => $request->desc,
                    'market_store_url'  => $request->market_store_url,
                    'fb_url'            => $request->fb_url,
                    'ig_url'            => $request->ig_url,
                    'yt_url'            => $request->yt_url,
                    'tk_url'            => $request->tk_url,
                    'video'             => $request->video,
                    'is_hki'            => $request->is_hki ? true : false,
                ]+$image+$bannerImage+$videoBanner
            );
                
            ProductCategory::where('product_id', $id)->delete();
            foreach(($request->category_id ?? []) as $item){
                ProductCategory::create([
                    'product_id'               => $product->id,
                    'meta_product_category_id' => $item
                ]);
            }

            if($request->file('product_image')){
                foreach($request->file('product_image') as $key => $item){
                    $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    ProductImage::create([
                        'product_id'      => $product->id,
                        'image'         => $path.$fileName[$key]
                    ]);
                }
            }

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('product_image') ?? [] as $key => $file)
                    $file->move($path, $fileName[$key]);
                
                if($request->file('image')) $request->file('image')->move($path, $thumbnailImageFileName);
                if($request->file('banner_image')) $request->file('banner_image')->move($path, $bannerImageFileName);
                if($request->file('video_banner')) $request->file('video_banner')->move($path, $videoBannerFileName);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('product.index')->with('success', 'Success Update Product!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::where('product_id', $id)->delete();
        ProductImage::where('product_id', $id)->delete();
        Product::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Product!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = Product::with(['category.meta_name', 'member']);

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id)->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }

        if ($request->get('category')) {
            $data = Product::with(['category.meta_name', 'member'])->whereHas('category', function ($query) use ($request) {
                return $query->where('meta_product_category_id', $request->get('category'));
            });
        }
        
        $data = $data->get();

        return DataTables::of($data)->make();
    }

    public function imagesDelete($id) 
    {
        $image = ProductImage::findOrFail($id);
        $image->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Image!',
        ]);
    }

    public function hki(Request $request)
    {

        // dd($request);
        Product::find($request->id)->update([
            'is_hki'   => $request->state,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Event Post!',
        ]);
    }

    public function approval(Request $request)
    {

        // dd($request);
        Product::find($request->id)->update([
            'is_approved'   => $request->state,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Event Post!',
        ]);
    }
}
