<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Member;
use App\Models\Members;
use App\Models\Sponsor;
use App\Models\MemberType;
use App\Models\StatusUser;
use App\Models\TeamMember;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("adminpage.content.management-homepage.team-member.index");
        // return view('contents.team-member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminpage.content.management-homepage.team-member.create");
        // return view('contents.team-member.create');
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
            'position' => 'required',
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
                    $path = 'files/team-member/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }


            $teamMember = TeamMember::create(
                [
                    'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                    'name'              => $request->name,
                    'position'          => $request->position,
                    'fb_url'            => $request->fb_url,
                    'ig_url'            => $request->ig_url,
                    'yt_url'            => $request->yt_url,
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

        return redirect()->route('team-member.index')->with('success', 'Success create Team Member!');
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
        $data['teamMember'] = TeamMember::find($id);

        return view("adminpage.content.management-homepage.team-member.edit", $data);
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
            'position' => 'required',
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
                    $path = 'files/team-member/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }

            $teamMember = TeamMember::find($id);
                $teamMember->update(
                    [
                        'name' => $request->name,
                        'position' => $request->position,
                        'fb_url' => $request->fb_url,
                        'ig_url' => $request->ig_url,
                        'yt_url' => $request->yt_url,
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

        return redirect()->route('team-member.index')->with('success', 'Success update Team Member!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = TeamMember::find($id);
        TeamMember::where('id', $id)->delete();
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
        $data = TeamMember::get();

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id);
        }
        
 
        return DataTables::of($data)->make();

    }
}
