<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\EventImage;
use App\Models\GuestEvent;
use App\Models\MemberType;
use App\Models\EventSpeaker;
use App\Models\EventSponsor;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use App\Models\Guest;
use App\Models\Speaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;



class EventController extends Controller
{
    public function index(Request $request)
    {
        if (getRoleName() == 'guest') {
            $guest = Auth::user()->guest;
            $guestEvent = $guest->guest_event()->with('event')->get();
        
            return view('contents.event.event_guest', compact('guestEvent'));
        }elseif($request->route()->getName() == 'event.guest.index'){
            $guestEvent = GuestEvent::where('user_id', Auth::user()->id)->with('event')->get();
        
            return view("adminpage.content.event.event_guest.index", compact("guestEvent"));
            // return view('contents.event.event_guest', compact('guestEvent'));
        } else {
            return view('adminpage.content.event.index');
        }
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('adminpage.content.event.create');
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
            'title'             => 'required',
            'desc'              => 'required',
            'start_datetime'    => 'required|date',
            'end_datetime'      => 'required|date|after:start_datetime',
            'address'           => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png,webp,svg',
            'banner_image.*'       => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back()
            ->with('error', $validator->errors()->first())
            ->withInput();
        }
        
        try {
            DB::beginTransaction();

            $path = 'files/events/image/';
            
    
            if($request->file('image')){
                $file = $request->file('image');
                $imageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$imageFileName];
            }else{
                $image = [];
            }

            $thumbnailUrl = [];
            if(count($request->video_url) > 0){
                foreach($request->video_url as $key => $item){
                    if($item != null || $item != ''){
                        parse_str( parse_url( $item, PHP_URL_QUERY ), $my_array_of_vars );
                        $dns = explode("/", $item);
                        // dd($dns);
                        if (isset($dns[2]) && $dns[2] == 'www.youtube.com')  {
                            $thumbnailUrl = ['image_video_thumbnail' => "https://img.youtube.com/vi/".$my_array_of_vars['v']."/hqdefault.jpg"];
                        } else {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Link video is not valid!',
                            ]);
                        }
                    }
                }
            }

            $event = Event::updateOrCreate(
                [ 'id' => $request->id ],
                [
                    'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                    'admin_id'          => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
                    'member_type_id'    => getRoleName() == 'admin' ?
                                                MemberType::where('name', 'Kemenprim')->first()->id 
                                                : Auth::user()->member->member_type_id,
                    'title'             => $request->title,
                    'subtitle'          => $request->subtitle,
                    'desc'              => $request->desc,
                    'start_datetime'    => $request->start_datetime,
                    'end_datetime'      => $request->end_datetime,
                    'address'           => $request->address,
                    'is_approved'       => isAutoApprove(),
                    'fb_url'            => $request->fb_url,
                    'ig_url'            => $request->ig_url,
                    'tk_url'            => $request->tk_url,
                    'yt_url'            => $request->yt_url,
                    'video'             => $item,
                ]+$image+$thumbnailUrl
            );
            
            foreach(($request->sponsor_id ?? []) as $item){
                EventSponsor::create([
                    'event_id'      => $event->id,
                    'sponsor_id'    => $item
                ]);
            }

            foreach(($request->category_id ?? []) as $item){
                EventCategory::create([
                    'event_id'               => $event->id,
                    'meta_event_category_id' => $item
                ]);
            }

            if ($request->keynote_speaker_id != null) {
                EventSpeaker::create([
                    'event_id'      => $event->id,
                    'speaker_id'    => $request->keynote_speaker_id,
                    'is_keynote'    => 1
                ]);
            }

            
            foreach(($request->speaker_id ?? []) as $item){
                EventSpeaker::create([
                    'event_id'      => $event->id,
                    'speaker_id'    => $item
                ]);
            }
            
            foreach($request->file('banner_image') ?? [] as $key => $item){
                $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                EventImage::create([
                    'event_id'      => $event->id,
                    'image'         => $path.$fileName[$key]
                ]);
            }
            
            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('banner_image') ?? [] as $key => $file){
                    $file->move($path, $fileName[$key]);
                }
                $request->file('image')->move($path, $imageFileName);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('event.index')->with('success', 'Success Create Event!');
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

        $data['event'] = Event::with(['category.meta_name', 'images'])->find($id);

        return view('adminpage.content.event.edit', $data);
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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'desc'              => 'required',
            'start_datetime'    => 'required|date|',
            'end_datetime'      => 'required|date|after:start_datetime',
            'address'           => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png,webp,svg',
            'banner_image.*'      => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->with('error', 'Please check your input! something is missing.')
                        ->withInput();
        }


        try {

            DB::beginTransaction();

            $path = 'files/events/image/';
            
            if($request->file('image')){
                $file = $request->file('image');
                $imageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$imageFileName];
            }else{
                $image = [];
            }

            $thumbnailUrl = [];
            if(count($request->video_url) > 0){
                foreach($request->video_url as $key => $item){
                    if($item != null || $item != ''){
                        parse_str( parse_url( $item, PHP_URL_QUERY ), $my_array_of_vars );
                        $dns = explode("/", $item);
                        
                        if (isset($dns[2]) && $dns[2] == 'www.youtube.com')  {
                            $thumbnailUrl = ['image_video_thumbnail' => "https://img.youtube.com/vi/".$my_array_of_vars['v']."/hqdefault.jpg"];
                        } else {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Link video is not valid!',
                            ]);
                        }
                    }
                }
            }

            $event = Event::find($id);
            $event->update(
            [
                'title'             => $request->title,
                'subtitle'          => $request->subtitle,
                'desc'              => $request->desc,
                'start_datetime'    => $request->start_datetime,
                'end_datetime'      => $request->end_datetime,
                'address'           => $request->address,
                'fb_url'            => $request->fb_url,
                'ig_url'            => $request->ig_url,
                'tk_url'            => $request->tk_url,
                'yt_url'            => $request->yt_url,
                'video'         => $item,
            ]+$image+$thumbnailUrl);

                
            EventSponsor::where('event_id', $id)->delete();
            foreach(($request->sponsor_id ?? []) as $item){
                EventSponsor::create([
                    'event_id'      => $id,
                    'sponsor_id'    => $item
                ]);
            }
            
            EventCategory::where('event_id', $id)->delete();
            foreach(($request->category_id ?? []) as $item){
                EventCategory::create([
                    'event_id'               => $id,
                    'meta_event_category_id' => $item
                ]);
            }

            EventSpeaker::where('event_id', $id)->delete();
            
            if($request->keynote_speaker_id != null){
                EventSpeaker::create([
                    'event_id'      => $event->id,
                    'speaker_id'    => $request->keynote_speaker_id,
                    'is_keynote'    => 1
                ]);
            }
            
            
            
            foreach(($request->speaker_id ?? []) as $item){
                EventSpeaker::create([
                    'event_id'      => $event->id,
                    'speaker_id'    => $item
                ]);
            }

            foreach($request->file('banner_image') ?? [] as $key => $item){
                $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                EventImage::create([
                    'event_id'      => $event->id,
                    'image'         => $path.$fileName[$key]
                ]);
            }

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('banner_image') ?? [] as $key => $file){
                    $file->move($path, $fileName[$key]);
                }
                if($request->file('image')){
                    $request->file('image')->move($path, $imageFileName);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('event.index')->with('success', 'Success Update Event!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EventCategory::where('event_id', $id)->delete();
        EventImage::where('event_id', $id)->delete();
        EventSponsor::where('event_id', $id)->delete();
        EventSpeaker::where('event_id', $id)->delete();
        GuestEvent::where('event_id', $id)->delete();
        Event::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Event!',
        ]);
    }

    public function imagesDelete($id) 
    {
        $image = EventImage::findOrFail($id);
        $image->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Image!',
        ]);
    }

    public function datatable(Request $request)
    {

        
        $data = Event::with(['category.meta_name', 'event_speaker.speaker', 'event_sponsor.sponsor', 'member']);

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id)->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }
        if(getRoleName() == 'guest'){
            $events_id = GuestEvent::where('guest_id', Auth::user()->guest->id)->pluck('event_id');
            $data = $data->whereIn('id', $events_id);
        }
        
        $data = $data->orderBy('created_at', 'DESC')->get();
        return DataTables::of($data)->make();
    }

    public function approval(Request $request)
    {
        Event::find($request->id)->update([
            'is_approved'   => $request->state,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Event Post!',
        ]);
    }

    public function upcomingEvent(){
        $role = getRoleName();
        $guestId = $role == 'guest' ? Auth::user()->guest->id : Auth::user()->id;

        $id = GuestEvent::where($role == 'guest' ? 'guest_id' : 'user_id', $guestId)->pluck('event_id');
        // dd($id);
        return response()->json([
            // 'data' => Event::whereIn('id', $id)
            //                 ->orWhere(getRoleName() == 'member' ? 'member_id' : 'admin_id', Auth::user()->{getRoleName()}->id)
            //                 ->where('end_datetime', '>=', now())->orderBy('start_datetime', 'ASC')
            //                 ->limit(3)
            //                 ->get()
            'data' => Event::where('end_datetime', '>=', now())
                            ->where(function($query) use ($id){
                                $query->whereIn('id', $id);
                                $query->orWhere(getRoleName() == 'member' ? 'member_id' : 'admin_id', Auth::user()->{getRoleName()}->id);
                            })
                            ->orderBy('start_datetime', 'ASC')
                            ->get()
            // 'data' => Event::where('end_datetime', '>=', now())->orderBy('start_datetime', 'DESC')
            //                 ->limit(3)
            //                 ->get()
        ]);
    }

    public function registerEvent(){
        $guestId = Auth::user()->guest->id;
        $id = GuestEvent::where('guest_id', $guestId)->pluck('event_id');
        $event = Event::whereNotIn('id',$id)->orderBy('start_datetime', 'DESC')->get();
        
        return view('contents.event.register-event', compact('event'));
    }

    public function storeRegisterEvent(Request $request){

        GuestEvent::create([
            'event_id' => $request->eventId,
            'guest_id' => $request->guestId,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success register to event!',
        ]);
    }
}



