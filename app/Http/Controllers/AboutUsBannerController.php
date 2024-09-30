<?php

namespace App\Http\Controllers;

use App\Models\AboutUsBanner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class AboutUsBannerController extends Controller
{
    public function index() {
        // $data = AboutUsBanner::all();
        $data= AboutUsBanner::get();
        return view('adminpage.content.management-homepage.management-banner.about-us-banner.index', $data);
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
                $path = 'files/about-us-banner/image/';
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path.$nameFile;
            } else {
                $imagePath = '';
            }

            $AboutUsBanner = new AboutUsBanner;
            $AboutUsBanner->image = $imagePath;
            $AboutUsBanner->save();

            DB::commit();

            return response()->json([
                'status' => true,
                'message'=> 'Data saved successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error saving data: '.$e->getMessage()]);
        }
    }


    public function edit($id)
        {
            return response()->json([
                'data'  =>AboutUsBanner::find($id)

            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();
    
            $AboutUsBanner = AboutUsBanner::find($id);
            $path = 'files/blog-banner/image/';
    
            if (!$AboutUsBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $imagePath = $path.$nameFile;
                $image->move($path, $nameFile);
            } else {
                $imagePath = $AboutUsBanner->image;
            }

            if ($AboutUsBanner->image && file_exists($AboutUsBanner->image)) {
                unlink($AboutUsBanner->image);
            }
            $AboutUsBanner->image = $imagePath;
            $AboutUsBanner->save();
    
            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: '.$e->getMessage()]);
        }
        
      
    }
    

        
        
    public function destroy($id)
    {
        AboutUsBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request){
        $data = AboutUsBanner::get();
        
        return DataTables::of($data)->make();
    }
}