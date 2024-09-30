<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        return view('adminpage.content.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.content.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content'  => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }
 
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->with('error', $validator->errors()->first())
        //                 ->withInput();
        // }

        try {
            DB::beginTransaction();

            $path = 'files/services/icon_image/';
            
    
            if($request->file('image')){
                $file = $request->file('image');
                $iconImage = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$iconImage];
            }else{
                $image = [];
            }

            $blog = Service::updateOrCreate(
            [ 'id' => $request->id ],
            [
                'admin_id'          => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
                'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                'title'             => $request->title,
                'content'           => $request->content,
            ]+$image);

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                
                if($request->file('image')) $request->file('image')->move($path, $iconImage);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('service.index')->with('success', 'Success create Service!');
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
        $data['service'] = Service::find($id);

        return view('contents.service.edit', $data);
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
            'title' => 'required',
            'content'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->with('error', $validator->errors()->first())
                        ->withInput();
        }

        try {
            DB::beginTransaction();

            $service = Service::find($id);
                $service->update(
                    [
                        'title'     => $request->title,
                        'content'   => $request->content,
                    ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('service.index')->with('success', 'Success edit Service!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Service::find($id);
        Service::where('id', $id)->delete();
        if ($user) {
            $user->delete();
            return response()->json([
                'status'    => true,
                'message'   => 'Success Delete Team Member!',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'User not found!',
            ]);
        }
    }

    public function datatable(Request $request){
        $data = new Service();

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id);
        }else{
            $data = $data->where('admin_id', '!=', null);
        }

        $data = $data->get();
        return DataTables::of($data)->make();

    }
}