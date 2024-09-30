<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaGalleryCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MetaGalleryCategoryController extends Controller
{
    public function index()
    {
        return view('adminpage.content.member_category.gallery.index');
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
        MetaGalleryCategory::create([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Gallery Category!',
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
            'data'  => MetaGalleryCategory::find($id)
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
        
        MetaGalleryCategory::find($id)->update([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Gallery Category!',
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
        MetaGalleryCategory::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Gallery Category!',
        ]);
    }

    public function datatable(Request $request){
        $data = MetaGalleryCategory::get();
        
        return DataTables::of($data)->make();
    }
    
    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = MetaGalleryCategory::where('name', 'LIKE', "%$query%")->get();
        
        return response()->json($data);
    }
}