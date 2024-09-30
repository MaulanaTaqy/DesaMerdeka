<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MetaBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpage.content.member_category.blog.index');
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
        $request->validate([
            'name' => 'required',
        ]);
        
        MetaBlogCategory::create([
            'name'          => $request->name,
            'is_approved'   => getRoleName() == 'admin' ? true : false,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Blog Category!',
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
            'data'  => MetaBlogCategory::find($id)
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
        $request->validate([
            'name' => 'required',
        ]);

        MetaBlogCategory::find($id)->update([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Blog Category!',
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
        MetaBlogCategory::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Blog Category!',
        ]);
    }

    public function datatable(Request $request){
        $data = MetaBlogCategory::get();
        
        return DataTables::of($data)->make();
    }
    
    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = MetaBlogCategory::where('name', 'LIKE', "%$query%")->get();
        
        return response()->json($data);
    }
}