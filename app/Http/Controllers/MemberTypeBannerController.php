<?php

namespace App\Http\Controllers;

use App\Models\MemberType;
use Illuminate\Http\Request;
use App\Models\MemberTypeBanner;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class MemberTypeBannerController extends Controller
{
    public function index()
    {
        // $data = BlogBanner::all();
        $data['member_type'] = MemberType::get();
        return view('adminpage.content.management-homepage.management-banner.member-type-banner.index', $data);
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
                $path = 'files/member-type-banner/image/';
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path . $nameFile;
            } else {
                $imagePath = '';
            }

            $memberTypeBanner = new MemberTypeBanner;
            $memberTypeBanner->member_type_id = $request->input('member_type_id');
            $memberTypeBanner->image = $imagePath;
            $memberTypeBanner->save();

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
            'data'  => MemberTypeBanner::with('member_type')->find($id)

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'member_type_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Please check your input! Something is missing.']);
            }

            $memberTypeBanner = MemberTypeBanner::find($id);
            $path = 'files/member-type-banner/image/';

            if (!$memberTypeBanner) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nameFile = md5($image->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $image->getClientOriginalExtension();
                $imagePath = $path . $nameFile;
                $image->move($path, $nameFile);
            } else {
                $imagePath = $memberTypeBanner->image;
            }

            if ($memberTypeBanner->image && file_exists($memberTypeBanner->image)) {
                unlink($memberTypeBanner->image);
            }
            $memberTypeBanner->member_type_id = $request->input('member_type_id');
            $memberTypeBanner->image = $imagePath;
            $memberTypeBanner->save();

            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        MemberTypeBanner::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Meta Member!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = MemberTypeBanner::with('member_type')->get();

        return DataTables::of($data)->make();
    }

    public function select2(Request $request)
    {
        $query = $request->term['term'] ?? '';
        $data = MemberType::where('name', 'LIKE', "%$query%")->get();

        return response()->json($data);
    }
}
