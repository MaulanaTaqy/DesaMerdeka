<?php

namespace App\Http\Controllers;

use App\Models\ProductBanner;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ProductBannerController extends Controller
{
    public function index()
    {
        // $data = ProductBanner::all();
        $data = ProductBanner::get();
        return view('adminpage.content.management-homepage.management-banner.product-banner.index', $data);
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
                $path = 'files/product-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = '';
            }

            $ProductBanner = new ProductBanner;
            $ProductBanner->image = $imagePath;
            $ProductBanner->save();

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
            'data'  => ProductBanner::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);
        
        try {
            DB::beginTransaction();

            $ProductBanner = ProductBanner::find($id);
            $path = 'files/product-banner/image/';

            if (!$ProductBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();

                $imagePath = $path . $nameFile;
                $image->move($path, $nameFile);
            } else {
                $imagePath = $ProductBanner->image;
            }

            if ($ProductBanner->image && file_exists($ProductBanner->image)) {
                unlink($ProductBanner->image);
            }

            $ProductBanner->image = $imagePath;
            $ProductBanner->save();

            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        ProductBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = ProductBanner::get();

        return DataTables::of($data)->make();
    }
}
