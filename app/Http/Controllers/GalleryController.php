<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gallery'] = Gallery::orderBy('created_at', 'DESC');

        if(getRoleName() == 'member'){
            $data['gallery'] = $data['gallery']->where('member_id', auth()->user()->member->id);
        }else{
            $data['gallery'] = $data['gallery']->where('admin_id', auth()->user()->admin->id);
        }

        $data['gallery'] = $data['gallery']->get();

        return view('adminpage.content.management-homepage.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
            'gallery_image.*' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
            // 'video_thumbnail' => ['required', 'regex:/^(https?:\/\/)?(www\.)?youtube\.com\/.+/'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }
        try {
            DB::beginTransaction();

            $path = 'files/gallery/admin/';

            if($request->file('image')){
                $file = $request->file('image');
                $thumbnailImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$thumbnailImageFileName];
            }else{
                $image = [];
            }
            
            $gallery = Gallery::create([
                'member_id' => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                'admin_id'  => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
                'title'     => $request->name,
                'desc'      => $request->desc,
                'date'      => $request->date,
                'location'  => $request->location,
            ]+$image);
            foreach(($request->category_id ?? []) as $item){
                GalleryCategory::create([
                    'gallery_id'               => $gallery->id,
                    'meta_gallery_category_id' => $item
                ]);
            }

            if($request->file('gallery_image')){
                foreach($request->file('gallery_image') as $key => $item){
                    $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    GalleryImage::create([
                        'gallery_id'    => $gallery->id,
                        'image'         => $path.$fileName[$key]
                    ]);
                }
            }

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('gallery_image') ?? [] as $key => $file)
                    $file->move($path, $fileName[$key]);
                
                if($request->file('image')) $request->file('image')->move($path, $thumbnailImageFileName);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return response()->json([
            'status'    => true,
            'gallery'   => $gallery,
            'message'   => 'Success Add Gallery!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $data['images'] = GalleryImage::with('gallery')->find($id);
    //     return view('contents.gallery.detail', $data);

    //     $data = Gallery::with(['category.meta_name']);    
    //     $data = $data->get();
    //     return DataTables::of($data)->make();

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('here');
        // $images = Gallery::with('category.meta_name')->find($id);
        // $gallery = GalleryImage::with('gallery')->where('gallery_id', $id)->get();
        // $videoGallery = GalleryVideo::with('gallery')->where('gallery_id', $id)->get();

        // return view('contents.gallery.edit', compact('images', 'gallery', 'videoGallery'));
        return response()->json([
            'data' => Gallery::with('category.meta_name')->find($id)
        ]);
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
        try {
            DB::beginTransaction();
    
            $path = 'files/gallery/admin/';
    
            if($request->file('image')){
                $file = $request->file('image');
                $thumbnailImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$thumbnailImageFileName];
            }else{
                $image = [];
            }
            
            $gallery = Gallery::find($id);
            $gallery->member_id = getRoleName() == 'admin' ? null : Auth::user()->member->id;
            $gallery->admin_id = getRoleName() == 'admin' ? Auth::user()->admin->id : null;
            $gallery->title = $request->name;
            $gallery->desc = $request->desc;
            $gallery->date = $request->date;
            $gallery->location = $request->location;
            $gallery->fill($image);
            $gallery->save();
    
            GalleryCategory::where('gallery_id', $id)->delete();

            foreach(($request->category_id ?? []) as $item){
                GalleryCategory::create([
                    'gallery_id'               => $id,
                    'meta_gallery_category_id' => $item
                ]);
            }
    
            if($request->file('gallery_image')){
                foreach($request->file('gallery_image') as $key => $item){
                    $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    GalleryImage::create([
                        'gallery_id'    => $gallery->id,
                        'image'         => $path.$fileName[$key]
                    ]);
                }
            }
    
            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('gallery_image') ?? [] as $key => $file)
                    $file->move($path, $fileName[$key]);
                
                if($request->file('image')) $request->file('image')->move($path, $thumbnailImageFileName);
            }
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    
        // return redirect()->route('gallery.index')->with('success','Success Update Gallery');
        return response()->json([
            'status'    => true,
            'message'   => 'Success Edit Gallery!',
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GalleryCategory::where('gallery_id', $id)->delete();
        GalleryImage::where('gallery_id', $id)->delete();
        GalleryVideo::where('gallery_id', $id)->delete();
        Gallery::where('id', $id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Gallery!',
        ]);
    }

    // public function showGallery($id)
    // {
    //     $data['images'] = GalleryImage::with('gallery')->find($id);
    //     return view('contents.gallery.detail', $data);

    // }


    public function datatable(Request $request)
    {   
        $data = Gallery::with(['category.meta_name']);    
        $data = $data->get();
        return DataTables::of($data)->make();
    }

    // public function galleryDatatable(Request $request)
    // {   
    //     $data = Gallery::with(['category.meta_name']);    
    //     $data = $data->get();
    //     dd($data);
    //     return DataTables::of($data)->make();
    // }
}
