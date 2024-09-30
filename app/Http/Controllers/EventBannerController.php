<?php

namespace App\Http\Controllers;

use App\Models\EventBanner;
use Illuminate\Http\Request;

use App\Models\HomeEventBanner;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class EventBannerController extends Controller
{
    public function index()
    {
        // $data = EventBanner::all();
        $data = HomeEventBanner::get();
        return view('adminpage.content.management-homepage.management-banner.event-banner.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'files/event-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = '';
            }

            $EventBanner = new HomeEventBanner;
            $EventBanner->image = $imagePath;
            $EventBanner->save();

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
            'data'  => HomeEventBanner::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            $EventBanner = HomeEventBanner::find($id);
            $path = 'files/event-banner/image/';

            if (!$EventBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = $EventBanner->image;
            }

            if ($EventBanner->image && file_exists($EventBanner->image)) {
                unlink($EventBanner->image);
            }

            $EventBanner->image = $imagePath;
            $EventBanner->save();

            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        HomeEventBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = HomeEventBanner::get();

        return DataTables::of($data)->make();
    }
}
