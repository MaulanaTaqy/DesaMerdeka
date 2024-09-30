<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Member;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\EventImage;
use App\Models\GuestEvent;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MemberKemenperinController extends Controller
{
    public function index()
    {
        return view('member.kemenperin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.kemenperin.create');
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
            'email'     => 'required|unique:users',
            'username'  => 'unique:users|min:4',
            'password'  => 'required',
            'name'      => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', getError($validator->errors()->all()))
                ->withInput();
        }

        $statusUser = StatusUser::where('name', 'unverified')->first()->id;

        try {
            DB::beginTransaction();

            $user = User::create(
                [
                    'username'          => $request->username,
                    'email'             => $request->email,
                    'password'          => bcrypt($request->password),
                    'status_user_id'    => $statusUser,
                ]
            )->assignRole('admin');

            $member = Admin::create(
                [
                    'user_id'   => $user->id,
                    'name'      => $request->name,
                ]
            );

            Mail::send('mail.activation', ['member' => $member, 'user' => $user, 'request' => $request], function($mail) use($request) {
                $mail->subject('Account Activation');
                $mail->to($request->email, $request->name);
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('kemenperin.index')->with('success', 'Success create Kemenperin!');
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

        $data['admin'] = Admin::find($id);

        return view('member.kemenperin.edit', $data);
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
            'name'      => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', getError($validator->errors()->all()))
                ->withInput();
        }

        try {
            DB::beginTransaction();

            Admin::find($id)->update(
                [
                    'name' => $request->name,
                ]
            );

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('kemenperin.index')->with('success', 'Success update member!');
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
            $user_id = Admin::find($id)->user_id;
            

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
    
            Admin::find($id)->delete();
            User::where('id', $user_id)->delete();
    
            Member::where('registered_by_member_id', $id)->update([
                'registered_by_member_id' => Admin::where('is_main', 1)->first()->id
            ]);
        } catch (\Exception $e) {
            return response()->json([            'status' => false,            'message' => $e->getMessage(),        ]);
        }
    
        return response()->json([        'status' => true,        'message' => 'Success Delete Member!',    ]);
    }


    public function datatable(Request $request)
    {
        $data = Admin::get();

        return DataTables::of($data)->make();
    }
}
