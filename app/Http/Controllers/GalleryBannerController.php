<?php

namespace App\Http\Controllers;

use App\Models\GalleryBanner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class GalleryBannerController extends Controller
{
    public function index()
    {
        // $data = GalleryBanner::all();
        $data = GalleryBanner::get();
        return view('adminpage.content.management-homepage.management-banner.gallery-banner.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'files/gallery-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = '';
            }

            $GalleryBanner = new GalleryBanner;
            $GalleryBanner->image = $imagePath;
            $GalleryBanner->save();

            DB::commit();

            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        return response()->json([
            'data'  => GalleryBanner::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            $GalleryBanner = GalleryBanner::find($id);
            $path = 'files/gallery-banner/image/';

            if (!$GalleryBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $imagePath = $path . $nameFile;
                $image->move($path, $nameFile);
            } else {
                $imagePath = $GalleryBanner->image;
            }

            if ($GalleryBanner->image && file_exists($GalleryBanner->image)) {
                unlink($GalleryBanner->image);
            }

            $GalleryBanner->image = $imagePath;
            $GalleryBanner->save();

            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        GalleryBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = GalleryBanner::get();

        return DataTables::of($data)->make();
    }
}
