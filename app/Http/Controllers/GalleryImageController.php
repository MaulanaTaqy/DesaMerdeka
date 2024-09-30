<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class GalleryImageController extends Controller
{
    public function show($id = NULL)
    {
        return view('adminpage.content.management-homepage.gallery.images', ['id' => $id]);
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
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
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
            // dd($request);
            $gallery = GalleryImage::create([
                'gallery_id' =>$request->gallery_id,
                'titile' => $request->name,
                'desc' => $request->desc,
                'date' => $request->date,
                'lokasi' => $request->location,
            ]+$image);

            if ($request->hasFile('image')) {    
                $file->move($path, $thumbnailImageFileName);
            }


    
            DB::commit();
    
            return response()->json([
                'status' => true,
                'gallery' => $gallery,
                'message' => 'Success Add Gallery!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $gallery = GalleryImage::with('gallery')->find($id);

        // $id = $gallery->gallery_id;

        // // $images = Gallery::with('category.meta_name')->find($id);
        // return view('contents.gallery.gallery_edit', compact( 'gallery','id'));

        return response()->json([
            'data' =>  GalleryImage::with('gallery')->find($id)
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
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }
    
        try {
            DB::beginTransaction();
    
            $path = 'files/gallery/admin/';
    
            if ($request->file('image')) {
                $file = $request->file('image');
                $thumbnailImageFileName = md5($file->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $file->getClientOriginalExtension();
                $image = ['image' => $path . $thumbnailImageFileName];
            } else {
                $image = [];
            }
           
    
            $gallery = GalleryImage::findOrFail($id);
            $updateData = [
                'titile' => $request->name,
                'desc' => $request->desc,
                'date' => $request->date,
                'lokasi' => $request->location,
            ] + $image;
    
            // if ($request->has('gallery_id')) {
            //     $updateData['gallery_id'] = $request->gallery_id;
            // }
            $gallery->update($updateData);
            if ($request->hasFile('image')) {
                $file->move($path, $thumbnailImageFileName);
            }
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    
        // return redirect()->route('galleryImages.showDetail', $request->gallery_id)->with('message', 'Success Update Gallery');
        return response()->json([
            'status' => true,
            'gallery' => $gallery,
            'message' => 'Success Edit Gallery!',
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
        GalleryImage::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Event!',
        ]);
    }


    public function datatable(Request $request, $id = null)
    {
        $query = GalleryImage::query()->with(['gallery', 'category', 'meta_name']);
    
        if ($id !== null) {
            $query->where('gallery_id', $id);
        }
    
        $data = $query->get();
    
        return DataTables::of($data)->make();
    }


}

