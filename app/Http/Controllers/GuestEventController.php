<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Guest;
use App\Models\GuestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GuestEventController extends Controller
{
    public function index($id = null)
    {
        return view("adminpage.content.manajemen_member.member_event.index", ["id" => $id]);
        // return view('contents.guest-event.index', ['id' => $id]);
    }

    public function show($id)
    {
        $isGuest = Guest::find($id);

        $eventIds = Event::where('member_id', Auth::user()->{getRoleName()}->id)
                        ->orWhere('admin_id', Auth::user()->{getRoleName()}->id)
                        ->pluck('id');
                        
        if(getRoleName() == 'admin')
            if(Auth::user()->admin->is_main == 1)
                $eventIds = Event::pluck('id');

        if($isGuest) $guestEvent = GuestEvent::where('guest_id', $id)->whereIn('event_id', $eventIds)->with('event')->get();
        else $guestEvent = GuestEvent::where('user_id', $id)->whereIn('event_id', $eventIds)->with('event')->get();
        
        return view("adminpage.content.manajemen_member.member_event.show", compact("guestEvent"));
        // return view('contents.event.event_guest', compact('guestEvent'));
    }

    public function datatable(Request $request, $id = null)
    {
        $data = Guest::with(['user', 'guest_event']);
        $dataUser = User::with('member');

        if($id){
            $guestIds = GuestEvent::where('event_id', $id)->pluck('guest_id');
            $userIds = GuestEvent::where('event_id', $id)->pluck('user_id');
        }else{
            
            $eventIds = Event::where('member_id', Auth::user()->{getRoleName()}->id)
                        ->orWhere('admin_id', Auth::user()->{getRoleName()}->id)
                        ->pluck('id');
                        
            if(getRoleName() == 'admin')
                if(Auth::user()->admin->is_main == 1)
                    $eventIds = Event::pluck('id');

            $guestIds = GuestEvent::whereIn('event_id', $eventIds)->pluck('guest_id');
            $userIds = GuestEvent::whereIn('event_id', $eventIds)->pluck('user_id');
        }
        
        $data = $data->whereIn('id', $guestIds)->get();
        $dataUser = $dataUser->whereIn('id', $userIds)->get();
        foreach ($data as $item) {
            $item->email = $item->user->email;
        }
        
        try {
            foreach ($dataUser as $item) {
                if($item->member){
                    $item->name = $item->member?->name;
                    $item->phone = $item->member?->phone;
                    $item->address = $item->member?->address;
                }elseif($item->admin){
                    $item->name = $item->admin?->name;
                    $item->phone = $item->admin?->phone;
                    $item->address = $item->admin?->address;
                }else{
                    $item->name = $item->guest?->name;
                    $item->phone = $item->guest?->phone;
                    $item->address = $item->guest?->address;
                }
            }
            
        } catch (\Exception $e) {
            dd($e->getMessage(), $item, $item->member, $item->admin, $item->guest, $item->getRoleNames());
        }
        
        $data = $data->merge($dataUser);
        
        return DataTables::of($data)->make();
    }
}
