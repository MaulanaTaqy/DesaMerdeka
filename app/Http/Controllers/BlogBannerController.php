<?php

namespace App\Http\Controllers;

use App\Models\BlogBanner;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class BlogBannerController extends Controller
{
    public function index() {
        // $data = BlogBanner::all();
        $data= BlogBanner::get();
        return view('adminpage.content.management-homepage.management-banner.blog-banner.index', $data);
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            if($request->hasFile('image')){
                $image = $request->file('image');
                $path = 'files/blog-banner/image/';
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path.$nameFile;
            } else {
                $imagePath = '';
            }

            $BlogBanner = new BlogBanner;
            $BlogBanner->image = $imagePath;
            $BlogBanner->save();

            DB::commit();

            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error saving data: '.$e->getMessage()]);
        }
    }


    public function edit($id)
    {
        return response()->json([
            'data'  =>BlogBanner::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();
    
            $BlogBanner = BlogBanner::find($id);
            $path = 'files/blog-banner/image/';
    
            if (!$BlogBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path.$nameFile;
            } else {
                $imagePath = $BlogBanner->image;
            }
        
            if ($BlogBanner->image && file_exists($BlogBanner->image)) {
                unlink($BlogBanner->image);
            }

            $BlogBanner->image = $imagePath;
            $BlogBanner->save();
    
            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: '.$e->getMessage()]);
        }
        
    }
    

        
        
    public function destroy($id)
    {
        BlogBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request){
        $data = BlogBanner::get();
        
        return DataTables::of($data)->make();
    }
}