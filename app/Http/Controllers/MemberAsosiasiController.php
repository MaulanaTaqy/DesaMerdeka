<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Member;
use App\Models\Gallery;
use App\Models\Members;
use App\Models\Product;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\EventImage;
use App\Models\GuestEvent;
use App\Models\MemberType;
use App\Models\StatusUser;
use App\Models\TeamMember;
use App\Models\BlogCategory;
use App\Models\EventSpeaker;
use App\Models\EventSponsor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use App\Models\MemberCategory;
use App\Models\ProductCategory;
use App\Models\MetaBlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MemberAsosiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("adminpage.content.manajemen_member.komunitas-asosiasi.index");
        // return view('contents.memberAsosiasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("adminpage.content.manajemen_member.komunitas-asosiasi.create");
        // return view('contents.memberAsosiasi.create');
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
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'username'  => 'unique:users|min:4',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', getError($validator->errors()->all()))
                ->withInput();
        }
        
        $id_member = optional(Auth::user()->{getRoleName()})->id ?? null;
        $statusUser = StatusUser::where('name', 'unverified')->first()->id;
        // $memberType = MemberType::where('name', 'Asosiasi')->first()->id;
        $memberType = MemberType::where('name', 'Asosiasi')->first()->id;
        
        try {
            DB::beginTransaction();

            $user = User::create(
            [
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status_user_id' => $statusUser,
            ])->assignRole('member');

            $member = Member::create(
            [
                'user_id' => $user->id,
                'member_type_id' => $memberType,
                'name' => $request->name,
                'phone' => $request->phone,
                'administrator_name' => $request->name_admin,
                'registered_by_member_id' => $id_member,
                'registered_at' => now()
            ]);

            Mail::send('mail.activation', ['member' => $member, 'user' => $user, 'request' => $request], function($mail) use($request) {
                $mail->subject('Account Activation');
                $mail->to($request->email, $request->name);
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect("komunitas-asosiasi")
            ->with('success', 'Success create Asociation Member!');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Member::with(['member_core', 'member_type', 'user', 'category.meta_name'])->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['member'] = Member::with(['category.meta_name'])->find($id);
        // $data['member'] = Member::withfind($id);

        return view("adminpage.content.manajemen_member.komunitas-asosiasi.edit", $data);
        // return view('contents.memberAsosiasi.edit', $data);
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
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', getError($validator->errors()->all()))
                ->withInput();
        }

        $path = 'files/member-files/';
        $path_img = 'files/asosiasi/image/';

        if($request->file('company_profile_file')){
            $fileCp = $request->file('company_profile_file');
            $cpOriginalName = explode('.', $fileCp->getClientOriginalName());
            $cpFileName = md5($fileCp->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $cpOriginalName[0] ."." . $fileCp->getClientOriginalExtension();
            $cpFile = ['company_profile_file'=> $path.$cpFileName];
        }else{
            $cpFile = [];
        }
        
        if($request->file('org_structure_file')){
            $fileOs = $request->file('org_structure_file');
            $osOriginalName = explode('.', $fileOs->getClientOriginalName());
            $osFileName = md5($fileOs->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $osOriginalName[0] ."." . $fileOs->getClientOriginalExtension();
            $osFile = ['org_structure_file'=> $path.$osFileName];
        }else{
            $osFile = [];
        }

        if($request->file('deed_file')){
            $fileD = $request->file('deed_file');
            $deedOriginalName = explode('.', $fileD->getClientOriginalName());
            $deedFileName = md5($fileD->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $deedOriginalName[0] ."." . $fileD->getClientOriginalExtension();
            $deedFile = ['deed_file'=> $path.$deedFileName];
        }else{
            $deedFile = [];
        }

        if($request->file('image')){
            $fileImage = $request->file('image');
            $imageOriginalName = explode('.', $fileImage->getClientOriginalName());
            $imageFileName = md5($fileImage->getClientOriginalName(). rand(rand(231, 992), 123882)). "-" . $imageOriginalName[0] ."." . $fileImage->getClientOriginalExtension();
            $imageFile = ['image'=> $path_img.$imageFileName];
        }else{
            $imageFile = [];
        }

        try {
            DB::beginTransaction();

            $member = Member::find($id);
            $member->update(
            [
                'name' => $request->name,
                'website_url' => $request->website_url,
                'desc' => $request->short_about_desc,
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
                'email_director' => $request->email_phone_director,
                'domicile_director' => $request->domicile_director,
                'administrator_name' => $request->administrator_name,
                'email_admin' => $request->email_phone_admin,
                'domicile_admin' => $request->domicile_admin,
                'deed_number' => $request->deed_number,
                'notary_name' => $request->notary_name,
                // 'comunity_name' => $request->comunity_name,
                'since' => $request->since,
                'approve_admin' => $request->approve_admin,
                'google_plus_url' => $request->google_plus_url,
                'twitter_url' => $request->twitter_url,
                
            ]+$imageFile+$cpFile+$osFile+$deedFile);

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path))File::makeDirectory($path, 0755, true, true);
                if(!File::isDirectory($path_img))File::makeDirectory($path_img, 0755, true, true);
                
                if ($request->file('company_profile_file')) {
                    $request->file('company_profile_file')->move($path, $cpFileName);
                }
                if ($request->file('org_structure_file')) {
                    $request->file('org_structure_file')->move($path, $osFileName);
                }
                if ($request->file('deed_file')) {
                    $request->file('deed_file')->move($path, $deedFileName);
                }
                if ($request->file('image')) {
                    $request->file('image')->move($path_img, $imageFileName);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('komunitas-asosiasi.index')->with('success', 'Success update member!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {    
            $user_id = Member::find($id)->user_id;
            $productIds = Product::where('member_id', $id)->pluck('id');
    
            $speakerIds = Speaker::where('member_id', $id)->pluck('id');
            $eventIds = Event::where('member_id', $id)->pluck('id');
            $blogIds = Blog::where('member_id', $id)->pluck('id');
            $memberIds = Member::where('user_id', $user_id)->pluck('id');
            EventSponsor::whereIn('event_id', $eventIds)->delete();
    
            EventSpeaker::whereIn('speaker_id', $speakerIds)->delete();
    
            Speaker::where('member_id', $id)->delete();
    
            Sponsor::whereIn('member_id', function($query) use ($id) {
                $query->select('id')->from('members')->where('id', $id);
            })->delete();
            GuestEvent::where('event_id', $id)->delete();
            MemberCategory::where('member_id', $id)->delete();
            ProductCategory::whereIn('product_id', function($query) use ($productIds) {
                $query->select('id')->from('products')->whereIn('id', $productIds);
            })->delete();
    
            
            ProductImage::whereIn('product_id', $productIds)->delete();
            Product::where('member_id', $id)->delete();
    
            EventCategory::whereIn('event_id', $eventIds)->delete();
    
            EventImage::whereIn('event_id', $eventIds)->delete();
            BlogCategory::whereIn('blog_id', $blogIds)->delete();
            TeamMember::whereIn('member_id', $memberIds)->delete();
            
            Event::where('member_id', $id)->delete();
            Blog::where('member_id', $id)->delete();
            Service::where('member_id', $id)->delete();
            Gallery::where('member_id', $id)->delete();
    
            Member::find($id)->delete();
            User::where('id', $user_id)->delete();
    
            Member::where('registered_by_member_id', $id)->update([
                'registered_by_member_id' => Admin::where('is_main', 1)->first()->id
            ]);
        } catch (\Exception $e) {
            return response()->json([            'status' => false,            'message' => $e->getMessage(),        ]);
        }
    
        return response()->json([        'status' => true,        'message' => 'Success Delete Member!',    ]);
    }


    public function datatable(Request $request){
        $type = MemberType::where('name', 'Komunitas/Asosiasi')->first()->id;
        $data = Member::with(['member_core', 'user.permissions'])->where('member_type_id' , $type);

        if(getRoleName() == 'member')
            $data = $data->where('registered_by_member_id', (auth()->user()->member->id));
            
        $data = $data->get();
        

        return DataTables::of($data)->make();
    }
}
