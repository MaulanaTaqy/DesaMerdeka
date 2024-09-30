<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Member;
use App\Models\Members;
use App\Models\Sponsor;
use App\Models\MemberType;
use App\Models\StatusUser;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpage.content.sponsors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.content.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'desc' => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->with('error', $validator->errors()->first())
                        ->withInput();
        }

        try {
            DB::beginTransaction();

            if(count($request->allFiles()) > 0){
                
                foreach ($request->allFiles() as $key => $item) {
                    $files[$key] = $request->file($key);
                }
                
                foreach($files as $key => $item){
                    $path = 'files/partner/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }

            $sponsor = Sponsor::updateOrCreate(
                [
                    'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                    'admin_id'          => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'desc' => $request->desc,
                    'email' => $request->email
                ]+$image);
            // dd($sponsor);

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($files as $key => $file){
                    $file->move($path, $nameFiles[$key]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('sponsors.index')->with('success', 'Success create Partner!');
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
        $data['sponsor'] = Sponsor::find($id);

        return view('adminpage.content.sponsors.edit', $data);
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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->with('error', $validator->errors()->first())
                        ->withInput();
        }

        try {
            DB::beginTransaction();

            if(count($request->allFiles()) > 0){
                
                foreach ($request->allFiles() as $key => $item) {
                    $files[$key] = $request->file($key);
                }
                
                foreach($files as $key => $item){
                    $path = 'files/partner/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }
            $sponsor = Sponsor::find($id);
                $sponsor = Sponsor::updateOrCreate(
                    [ 'id' => $request->id ],
                    [
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'desc' => $request->desc,
                        'email' => $request->email
                    ]+$image);

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($files as $key => $file){
                    $file->move($path, $nameFiles[$key]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('sponsors.index')->with('success', 'Success update Partner!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sponsor::find($id);
        Sponsor::where('id', $id)->delete();
        if ($user) {
            $user->delete();
            return response()->json([
                'status'    => true,
                'message'   => 'Success Delete Partner!',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'partner not found!',
            ]);
        }
    }

    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = Sponsor::where('name', 'LIKE', "%$query%");
        
        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id);
        }
        $data = $data->get();
        
        return response()->json($data);
    }


    public function datatable(Request $request){
        $data = new Sponsor();

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id);
        }else{
            // $data = $data->where('admin_id', '!=', null);
        }

        $data = $data->get();

        return DataTables::of($data)->make();
    }
    
    public function approval(Request $request)
    {
        Sponsor::find($request->id)->update([
            'is_approved'   => $request->state1,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Updated!',
        ]);
    }

    public function isShowed(Request $request)
    {
        // dd($request->state2);
        Sponsor::find($request->is_showed)->update([
            'is_showed'   => $request->state2,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Success Change Visibility Status!',
        ]);
    }
}