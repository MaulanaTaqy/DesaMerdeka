<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use App\Models\MetaMemberCategory;
use App\Models\Roadmap;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RoadmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roadmap.index');
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
        // dd($request);
        Roadmap::create([
            'type'       => $request->type,
            'q1_title'   => $request->q1Title,
            'q1_desc'    => $request->q1Desc,
            'q2_title'   => $request->q2Title,
            'q2_desc'    => $request->q2Desc,
            'q3_title'   => $request->q3Title,
            'q3_desc'    => $request->q3Desc,
            'year'       => $request->year,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Data Roadmap!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            'data'  => Roadmap::find($id)
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
        Roadmap::find($id)->update([
            'type'       => $request->type,
            'year'       => $request->year,
            'q1_title'   => $request->q1Title,
            'q1_desc'    => $request->q1Desc,
            'q2_title'   => $request->q2Title,
            'q2_desc'    => $request->q2Desc,
            'q3_title'   => $request->q3Title,
            'q3_desc'    => $request->q3Desc,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Data Roadmap!',
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
        Roadmap::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Data Roadmap!',
        ]);
    }

    public function datatable(Request $request){
        $data = Roadmap::get();
        
        return DataTables::of($data)->make();
    }
}
