<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use App\Models\MetaMemberCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MetaMemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpage.content.member_category.member.index');
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
        MetaMemberCategory::create([
            'name'          => $request->name,
            'is_approved'   => getRoleName() == 'admin' ? true : false,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Meta Member!',
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
            'data'  => MetaMemberCategory::find($id)
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
        MetaMemberCategory::find($id)->update([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Meta Member!',
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
        MetaMemberCategory::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Meta Member!',
        ]);
    }

    public function datatable(Request $request){
        $data = MetaMemberCategory::get();
        
        return DataTables::of($data)->make();
    }
    

    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = MetaMemberCategory::where('name', 'LIKE', "%$query%")->get();
        
        return response()->json($data);
    }
}