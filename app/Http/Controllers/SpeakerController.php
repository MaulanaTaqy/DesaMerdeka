<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Member;
use App\Models\Members;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\MemberType;
use App\Models\StatusUser;
use App\Models\BlogCategory;
use App\Models\EventSpeaker;
use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\EventSpeakerController;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpage.content.event.event-speaker.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.content.event.event-speaker.create');
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
            'title' => 'required',
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
                    $path = 'files/speakers/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }

            $speaker = Speaker::create(
                [
                    'name'              => $request->name,
                    'title'             => $request->title,
                    'fb_url'            => $request->fb_url,
                    'ig_url'            => $request->ig_url,
                    // 'yt_url'            => $request->yt_url,
                    'linkedIn_url'      => $request->li_url,
                    'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                    'admin_id'          => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
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

        return redirect()->route('meta.speakers.index')->with('success', 'Success create Speaker!');
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
        $data['speaker'] = Speaker::find($id);

        return view('adminpage.content.event.event-speaker.edit', $data);
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
            'title' => 'required',
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
                    $path = 'files/technopark/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }
            $speaker = Speaker::find($id);
                $speaker->update(
                    [
                        'name' => $request->name,
                        'title' => $request->title,
                        'fb_url' => $request->fb_url,
                        'ig_url' => $request->ig_url,
                        'linkedIn_url' => $request->li_url,
                        // 'yt_url' => $request->yt_url,
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

        return redirect()->route('meta.speakers.index')->with('success', 'Success update speaker!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Speaker::find($id);
        Speaker::where('id', $id)->delete();
        if ($user) {
            $user->delete();
            return response()->json([
                'status'    => true,
                'message'   => 'Success Delete Speaker!',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'User not found!',
            ]);
        }
    }

    public function select2(Request $request){
        $query = $request->term['term'] ??'';
        $data = Speaker::where('name', 'LIKE', "%$query%");
        
        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id);
        }
        $data = $data->get();
        
        return response()->json($data);
    }


    public function datatable(Request $request){
        $data = new Speaker();

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id);
        }
        
        $data = $data->get();
        return DataTables::of($data)->make();
    }
}
