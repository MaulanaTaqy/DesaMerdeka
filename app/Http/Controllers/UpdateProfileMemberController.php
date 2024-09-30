<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Member;
use App\Models\Members;
use App\Models\MemberType;
use App\Models\StatusUser;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\TermCondition;
use App\Models\MemberCategory;
use App\Models\MetaBlogCategory;
use App\Models\MetaMemberCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UpdateProfileMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Mendapatkan user yang sedang login dan ID member-nya
        $user = Auth::user();
        $memberId = $user->{getRoleName()}->id;
        $category = MetaMemberCategory::orderBy('name')->get();

        // Mendapatkan data profil member dengan ID yang sesuai
        $member = Member::with(['member_type', 'category'])->where('id', $memberId)->first();

        $selectedCategoryIds = MemberCategory::where('member_id', $memberId)
        ->pluck('meta_member_category_id')
        ->toArray();

        $termCondition = TermCondition::select('term_conditions')->get();
        // dd($termCondition);

        return view('adminpage.content.management-homepage.profile-member.index', compact('member','category','termCondition','selectedCategoryIds'));
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
        //
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
        //
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
        // mendapatkan user yang sedang login
        $user = Auth::user();
        $memberType = $user->member->member_type->name;

        Role::where('name', 'member')->first();
        $statusUser = StatusUser::where('name', 'unverified')->first()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric',
            'desc'  => 'required',
            'agree' => 'accepted', 
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        $path_pdf = 'files/member-files/pdf/';
        $path_img = 'files/member-files/image/';

        if($request->file('company_profile_file')){
            $fileCp = $request->file('company_profile_file');
            $cpOriginalName = explode('.', $fileCp->getClientOriginalName());
            $cpFileName = md5($fileCp->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $cpOriginalName[0] ."." . $fileCp->getClientOriginalExtension();
            $cpFile = ['company_profile_file'=> $path_pdf.$cpFileName];
        }else{
            $cpFile = [];
        }
        
        if($request->file('org_structure_file')){
            $fileOs = $request->file('org_structure_file');
            $osOriginalName = explode('.', $fileOs->getClientOriginalName());
            $osFileName = md5($fileOs->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $osOriginalName[0] ."." . $fileOs->getClientOriginalExtension();
            $osFile = ['org_structure_file'=> $path_pdf.$osFileName];
        }else{
            $osFile = [];
        }

        if($request->file('deed_file')){
            $fileD = $request->file('deed_file');
            $deedOriginalName = explode('.', $fileD->getClientOriginalName());
            $deedFileName = md5($fileD->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $deedOriginalName[0] ."." . $fileD->getClientOriginalExtension();
            $deedFile = ['deed_file'=> $path_pdf.$deedFileName];
        }else{
            $deedFile = [];
        }
        
        if($request->file('image')){
            $fileImg = $request->file('image');
            $imgOriginalName = explode('.', $fileImg->getClientOriginalName());
            $imgFileName = md5($fileImg->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $imgOriginalName[0] ."." . $fileImg->getClientOriginalExtension();
            $image = ['image'=> $path_img.$imgFileName];
        }else{
            $image = [];
        }

        try {
            DB::beginTransaction();

            $member = member::find($id);
            $member->update(
                [
                    'name' => $request->name,
                    'website_url' => $request->website_url,
                    'desc' => $request->desc,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'gmap_url' => $request->gmap_url,
                    'view_1_url' => $request->view_1_url,
                    'view_2_url' => $request->view_2_url,
                    'view_3_url' => $request->view_3_url,
                    'fb_url' => $request->fb_url,
                    'ig_url' => $request->ig_url,
                    'start_day' => $request->start_day,
                    'end_day' => $request->end_day,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'director_name' => $request->director_name,
                    'email_director' => $request->email_director,
                    'phone_director' => $request->phone_director,
                    'domicile_director' => $request->domicile_director,
                    'administrator_name' => $request->administrator_name,
                    'email_admin' => $request->email_admin,
                    'phone_admin' => $request->phone_admin,
                    'domicile_admin' => $request->domicile_admin,
                    'deed_number' => $request->deed_number,
                    'notary_name' => $request->notary_name,
                    // 'comunity_name' => $request->comunity_name,
                    'since' => $request->since,
                    'approve_admin' => $request->approve_admin,
                    'google_plus_url' => $request->google_plus_url,
                    'twitter_url' => $request->twitter_url,
                    // 'registered_by_member_id' => $request->registered_by_member_id,
                    // 'registered_at' => now()
                ]+$image+$cpFile+$osFile+$deedFile);
                
            foreach ($request->category_id as $item) {
                MemberCategory::create([
                    'member_id'               => $member->id ?: $request->id ,
                    'meta_member_category_id' => $item
                ]);
            }
            MemberCategory::where('member_id', $id)->delete();
            foreach(($request->category_id ?? []) as $item){
                MemberCategory::create([
                    'member_id' => $member->id ?: $request->id,
                    'meta_member_category_id' => $item
                ]);
            }
            
            if(!File::isDirectory($path_pdf)) File::makeDirectory($path_pdf, 0755, true, true);
            if(isset($fileCp)) $fileCp->move($path_pdf, $cpFileName);
            if(isset($fileOs)) $fileOs->move($path_pdf, $osFileName);
            if(isset($fileD)) $fileD->move($path_pdf, $deedFileName);
            
            if(!File::isDirectory($path_img)) File::makeDirectory($path_img, 0755, true, true);
            if(isset($fileImg)) $fileImg->move($path_img, $imgFileName);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->back()->with('success', 'Success update member!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
