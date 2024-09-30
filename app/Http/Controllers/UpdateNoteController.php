<?php

namespace App\Http\Controllers;

use App\Models\UpdateNote;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UpdateNoteController extends Controller
{
    public function index()
    {
        $guides = UpdateNote::get();
        return view('adminpage.content.help.update-noted.update-noted', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = UpdateNote::create([
            'title'         => $request->title,
            'desc'          => $request->desc,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success add Noted Category!',
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
            'data'  => UpdateNote::find($id)
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
        UpdateNote::find($id)->update([
            'title'         => $request->title,
            'desc'          => $request->desc,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Noted Category!',
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
        UpdateNote::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Noted Category!',
        ]);
    }

    public function datatable(Request $request)
    {
        $data = UpdateNote::orderBy('created_at', 'asc')->get();

        return DataTables::of($data)->make();
    }
}