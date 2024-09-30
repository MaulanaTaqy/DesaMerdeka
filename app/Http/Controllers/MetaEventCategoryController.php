<?php

namespace App\Http\Controllers;

use App\Models\MetaBlogCategory;
use App\Models\MetaEventCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MetaEventCategoryController extends Controller
{
    public function index()
    {
        return view('adminpage.content.member_category.event.index');
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
       $data= MetaEventCategory::create([
            'name'          => $request->name,
            
            'is_approved'   => getRoleName() == 'admin' ? true : false,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Event Category!',
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
            'data'  => MetaEventCategory::find($id)
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
        MetaEventCategory::find($id)->update([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Event Category!',
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
        MetaEventCategory::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Blog Category!',
        ]);
    }

    public function datatable(Request $request){
        $data = MetaEventCategory::with('member')->orderBy('created_at','asc')->get();
        
        return DataTables::of($data)->make();
    }
    
    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = MetaEventCategory::where('name', 'LIKE', "%$query%")->get();
        
        return response()->json($data);
    }
}