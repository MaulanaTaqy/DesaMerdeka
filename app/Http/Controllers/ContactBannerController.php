<?php

namespace App\Http\Controllers;

use App\Models\ContactBanner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ContactBannerController extends Controller
{
    public function index() {
        // $data = BlogBanner::all();
        $data= ContactBanner::get();
        return view('adminpage.content.management-homepage.management-banner.contact-banner.index', $data);
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
                $path = 'files/contact-banner/image/';
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path.$nameFile;
            } else {
                $imagePath = '';
            }

            $ContactBanner = new ContactBanner;
            $ContactBanner->image = $imagePath;
            $ContactBanner->save();

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
            'data'  =>ContactBanner::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);
    
        try {
            DB::beginTransaction();
    
            $ContactBanner = ContactBanner::find($id);
            $path = 'files/contact-banner/image/';
    
            if (!$ContactBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path.$nameFile;
            } else {
                $imagePath = $ContactBanner->image;
            }
        
            if ($ContactBanner->image && file_exists($ContactBanner->image)) {
                unlink($ContactBanner->image);
            }

            $ContactBanner->image = $imagePath;
            $ContactBanner->save();
    
            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: '.$e->getMessage()]);
        }
        
    }
    

        
        
    public function destroy($id)
    {
        ContactBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request){
        $data = ContactBanner::get();
        
        return DataTables::of($data)->make();
    }
}