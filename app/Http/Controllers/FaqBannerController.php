<?php

namespace App\Http\Controllers;

use App\Models\FaqBanner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class FaqBannerController extends Controller
{
    public function index()
    {
        // $data = FaqBanner::all();
        $data = FaqBanner::get();
        return view('adminpage.content.management-homepage.management-banner.faq-banner.index', $data);
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
                $path = 'files/faq-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = '';
            }

            $FaqBanner = new FaqBanner;
            $FaqBanner->image = $imagePath;
            $FaqBanner->save();

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
            'data'  => FaqBanner::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            $FaqBanner = FaqBanner::find($id);
            $path = 'files/faq-banner/image/';

            if (!$FaqBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = $FaqBanner->image;
            }

            if ($FaqBanner->image && file_exists($FaqBanner->image)) {
                unlink($FaqBanner->image);
            }

            $FaqBanner->image = $imagePath;
            $FaqBanner->save();

            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        FaqBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = FaqBanner::get();

        return DataTables::of($data)->make();
    }
}
