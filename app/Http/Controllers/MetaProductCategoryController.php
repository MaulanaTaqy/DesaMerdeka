<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaProductCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MetaProductCategoryController extends Controller
{
    public function index()
    {
        return view('adminpage.content.member_category.produk.index');
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
        MetaProductCategory::create([
            'name'          => $request->name,
            'is_approved'   => getRoleName() == 'admin' ? true : false,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Product Category!',
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
            'data'  => MetaProductCategory::find($id)
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
        
        MetaProductCategory::find($id)->update([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Product Category!',
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
        MetaProductCategory::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Product Category!',
        ]);
    }

    public function datatable(Request $request){
        $data = MetaProductCategory::get();
        
        return DataTables::of($data)->make();
    }
    
    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = MetaProductCategory::where('name', 'LIKE', "%$query%")->get();
        
        return response()->json($data);
    }
}