<?php

namespace App\Http\Controllers;

use App\Models\RoadmapBanner as RoadMapBanner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class RoadMapBannerController extends Controller
{
    public function index()
    {
        // $data = RoadMapBanner::all();
        $data = RoadMapBanner::get();
        return view('adminpage.content.management-homepage.management-banner.roadmap-banner.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'files/roadmap-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = '';
            }

            $RoadMapBanner = new RoadMapBanner;
            $RoadMapBanner->image = $imagePath;
            $RoadMapBanner->save();

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
            'data'  => RoadMapBanner::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            $RoadMapBanner = RoadMapBanner::find($id);

            if (!$RoadMapBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'files/roadmap-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();

                $image->move($path, $nameFile);
            } else {
                $imagePath = $RoadMapBanner->image;
            }

            $imagePath = $path . $nameFile;
            if ($RoadMapBanner->image && file_exists($RoadMapBanner->image)) {
                unlink($RoadMapBanner->image);
            }

            $RoadMapBanner->image = $imagePath;
            $RoadMapBanner->save();

            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        RoadMapBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = RoadMapBanner::get();

        return DataTables::of($data)->make();
    }
}
