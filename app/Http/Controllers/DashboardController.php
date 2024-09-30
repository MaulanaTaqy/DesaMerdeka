<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\User;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Member;
use App\Models\AboutUs;
use App\Models\Product;
use App\Charts\EventChart;
use App\Charts\totalEvent;
use App\Models\GuestEvent;

use App\Models\MemberType;
use App\Charts\TechnoTotal;
use App\Charts\MembersChart;
use Illuminate\Http\Request;
use App\Charts\EndEventChart;
use App\Charts\EventNowChart;
use App\Charts\TotalUPAndEnd;
use App\Models\EventCategory;
use App\Charts\TechnoEventEnd;
use App\Charts\TechnoUpcoming;
use App\Charts\TechnoparkChart;
use App\Models\ProductCategory;
use App\Charts\RegisterUserChart;
use App\Models\MetaEventCategory;
use App\Charts\EventUpComingChart;
use Illuminate\Support\Facades\DB;
use App\Charts\GuestEventJoinChart;
use App\Models\MetaProductCategory;
use App\Charts\EventDoneMemberChart;
use App\Charts\MembersEventNowChart;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Charts\EventUpcomingMembersChart;
use App\Charts\TotalSemuaEventMemberChart;

class DashboardController extends Controller
{

    
    public function index(RegisterUserChart $chart, EventChart $grafik,EndEventChart $endEvent, EventNowChart $nowEvent, EventUpComingChart $incomingEvent, totalEvent $totalEvent, GuestEventJoinChart $guestEvent, MembersChart $grafikMemberEvent, MembersEventNowChart $ongoingEvent, EventDoneMemberChart $doneEvent, EventUpcomingMembersChart $upcomingEventMember,TotalSemuaEventMemberChart $totalEventMembers,  TechnoparkChart $technoBar, TechnoEventEnd $technoParkDone, TechnoUpcoming $technoUpcoming,TechnoTotal $technoTotal)
    {
        
        $data['about'] = AboutUs::first();
        
        if(!Auth::user()->can('approved') && getRoleName() != 'admin'){
            
            if(Auth::user()->guest){
                $allEvent = Event::count();
                $eventCount = auth()->user()->guest->guest_event()->count();
                $eventJoined = Event::where('end_datetime', '<', now())->whereHas('guest_event', function($query) {
                                $query->where('guest_id', auth()->user()->guest->id);
                                })
                            ->orderBy('start_datetime', 'DESC')->count();      
                $evenIncoming = Event::where('start_datetime', '>', now())->whereHas('guest_event', function($query) {
                                $query->where('guest_id', auth()->user()->guest->id);
                                })
                            ->orderBy('start_datetime', 'DESC')->count();    
                $incoming =  Event::where('start_datetime', '>', now())->whereHas('guest_event', function($query) {
                            $query->where('guest_id', auth()->user()->guest->id);
                            })
                            ->get();
        
                $eventsByMonth = Event::select(DB::raw('YEAR(start_datetime) year, MONTH(start_datetime) month, COUNT(*) as count'))
                        ->groupBy('year', 'month')
                        ->get();

                $data = [
                    'labels' => [],
                    'counts' => []
                ];
        
                foreach ($eventsByMonth as $event) {
                    $data['labels'][] = date('F Y', mktime(0, 0, 0, $event->month, 1, $event->year));
                    $data['counts'][] = $event->count;
                }
                $guestEvent= $guestEvent->build();
              
                // dd($data);
                return view('contents.dashboard.index', compact('event', 'guestEvent', 'eventCount','evenIncoming','data','incoming','eventsByMonth','eventJoined','allEvent','guestEvent'));
            }

            if(Auth::user()->member->registered_by_member_id)
                return redirect()->route('profile-member.index');
            
            return redirect()->route('auth.selection');
        }
        
        $data = [];
        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->month;
        

        $memberType = MemberType::get();
        $memberTypes = [];
        foreach($memberType as $type){
            $memberTypes += [
                $type->name => $memberType->where('name', $type->name)->first()
            ];
        }

        // Query
        $countDesaQuery = Member::whereHas('member_type', function ($query) {
            // $query->where('name', 'Technopark');
            $query->where('name', 'Desa');
        });
        $countKomunitasQuery = Member::whereHas('member_type', function ($query) {
            // $query->where('name', 'Asosiasi');
            $query->where('name', 'Komunitas/Asosiasi');
        });
        $countUmkmQuery = Member::whereHas('member_type', function ($query) {
            // $query->where('name', 'Startup');
            $query->where('name', 'UMKM');
        });
        $countIndustriQuery = Member::whereHas('member_type', function ($query) {
            // $query->where('name', 'Komunitas');
            $query->where('name', 'Industri');
        });
        $countGuestQuery = Guest::query();
        $countBlogQuery = Blog::query();
        $countProductQuery = Product::query();
        $countEventQuery = Event::query();

        $meta = MetaEventCategory::query();
        
        $event = Event::with(['category.meta_name', 'member'])->orderBy('created_at', 'desc');

        $topEvents = Event::whereYear('start_datetime', '=', $currentYear)
                    ->withCount('guest_event')->orderBy('guest_event_count','DESC')
                    ->limit(5);        
            
        $eventSekarang = Event::whereYear('start_datetime', '=', $currentYear)
                        ->with(['member','admin'])
                        ->limit(5);
                        
        $eventSoon = Event::where('start_datetime', '>', $now)
                    ->with(['member', 'admin'])
                    ->limit(5);
                        
        $app = Product::with(['category.meta_name','member','admin'])->orderBy('created_at', 'desc');
        $metaProduct = MetaProductCategory::query();

        $pengguna = User::with(['guest','member','status_user'])->orderBy('created_at', 'desc')->limit(5);
        // dd(auth()->user()->id);
        if(Auth::user()->admin){

            $data['countDesaSemua']   = $countDesaQuery->count();
            $data['countDesa']        = $countDesaQuery
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();
            $data['countKomunitasSemua']     = $countKomunitasQuery->count();
            $data['countKomunitas']          = $countKomunitasQuery
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();
            $data['countUmkmSemua']     = $countUmkmQuery->count();
            $data['countUmkm']          = $countUmkmQuery
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();
            $data['countIndustriSemua']     = $countIndustriQuery->count();
            $data['countIndustri']          = $countIndustriQuery
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();

            $data['countGuestSemua']         = $countGuestQuery->count();

            $data['countBlogSemua']         = $countBlogQuery->count();
            $data['countBlog']              = $countBlogQuery->where('is_approved', '0')->count();
            $data['countProductSemua']      = $countProductQuery->count();
            $data['countProduct']           = $countProductQuery->where('is_approved', '0')->count();
            $data['countEventSemua']         = $countEventQuery->count();
            $data['countEvent']              = $countEventQuery->where('is_approved', '0')->count();
                                                
            $data['meta']           = $meta->with('category.event')->get();
            $data['topEvents']      = $topEvents->get();
            $data['event']          = $event->get();
            $data['eventSekarang']  = $eventSekarang->get();
            $data['eventSoon']      = $eventSoon->get();

            $data['app']            = $app->get();
            $data['metaProduct']    = $metaProduct->withCount('category')->with('category')->get();

        }
        if(Auth::user()->member){
            $searchMemberByid = Auth::user()->member->id;
            $listMemberJoined = Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id');

            $data['countDesaSemua']   = $countDesaQuery->where('registered_by_member_id',$searchMemberByid)->count();
            $data['countDesa']        = $countDesaQuery->where('registered_by_member_id',$searchMemberByid)
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();
            $data['countKomunitasSemua']     = $countKomunitasQuery->where('registered_by_member_id',$searchMemberByid)->count();
            $data['countKomunitas']          = $countKomunitasQuery->where('registered_by_member_id',$searchMemberByid)
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();
            $data['countUmkmSemua']     = $countUmkmQuery->where('registered_by_member_id',$searchMemberByid)->count();
            $data['countUmkm']          = $countUmkmQuery->where('registered_by_member_id',$searchMemberByid)
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();
            $data['countIndustriSemua']     = $countIndustriQuery->where('registered_by_member_id',$searchMemberByid)->count();
            $data['countIndustri']          = $countIndustriQuery->where('registered_by_member_id',$searchMemberByid)
                                                ->whereDoesntHave('user', function ($query) {
                                                    $query->permission('approved');
                                                })->count();

            $data['countBlogSemua']     = $countBlogQuery
                                            ->where(function($query) use($searchMemberByid, $listMemberJoined){
                                                $query->where('member_id', $searchMemberByid);
                                                $query->orWhereIn('member_id', $listMemberJoined);
                                            })                                
                                            ->count();
            $data['countBlog']          = $countBlogQuery
                                            ->where('is_approved', '0')
                                            ->where(function($query) use($searchMemberByid, $listMemberJoined){
                                                $query->where('member_id', $searchMemberByid);
                                                $query->orWhereIn('member_id', $listMemberJoined);
                                            })
                                            ->count();

            $data['countProductSemua']  = $countProductQuery
                                            ->where(function($query) use($searchMemberByid, $listMemberJoined){
                                                $query->where('member_id', $searchMemberByid);
                                                $query->orWhereIn('member_id', $listMemberJoined);
                                            })                                
                                            ->count();
            $data['countProduct']       = $countProductQuery
                                            ->where('is_approved', '0')
                                            ->where(function($query) use($searchMemberByid, $listMemberJoined){
                                                $query->where('member_id', $searchMemberByid);
                                                $query->orWhereIn('member_id', $listMemberJoined);
                                            })
                                            ->count();

            $data['countEventSemua']    = $countEventQuery
                                            ->where(function($query) use($searchMemberByid, $listMemberJoined){
                                                $query->where('member_id', $searchMemberByid);
                                                $query->orWhereIn('member_id', $listMemberJoined);
                                            })                                
                                            ->count();
            $data['countEvent']         = $countEventQuery
                                            ->where('is_approved', '0')
                                            ->where(function($query) use($searchMemberByid, $listMemberJoined){
                                                $query->where('member_id', $searchMemberByid);
                                                $query->orWhereIn('member_id', $listMemberJoined);
                                            })
                                            ->count();


            $data['event'] = $event->where(function($query) use($searchMemberByid, $listMemberJoined){
                                        $query->where('member_id', $searchMemberByid);
                                        $query->orWhereIn('member_id', $listMemberJoined);
                                    })->get();

            $data['countGuestSemua'] = $countGuestQuery->whereIn('id', GuestEvent::whereIn('event_id', $data['event']->pluck('id'))->pluck('id'))->count();
            
            $eventCategoryIds = EventCategory::whereIn('event_id', $data['event']->pluck('id'))->pluck('meta_event_category_id');
            $data['meta'] = $meta->withCount(['category' => function($q) use($data){
                                $q->whereIn('event_id', $data['event']->pluck('id'));
                            }])->with(['category' => function($q) use($data){
                                $q->with('event');
                                $q->whereIn('event_id', $data['event']->pluck('id'));
                            }])->whereIn('id', $eventCategoryIds)->get();

            $data['topEvents'] = $topEvents->where(function($query) use($searchMemberByid, $listMemberJoined){
                                        $query->where('member_id', $searchMemberByid);
                                        $query->orWhereIn('member_id', $listMemberJoined);
                                    })->get();
            

            $data['eventSekarang']  = $eventSekarang->where(function($query) use($searchMemberByid, $listMemberJoined){
                                        $query->where('member_id', $searchMemberByid);
                                        $query->orWhereIn('member_id', $listMemberJoined);
                                    })->get();

            $data['eventSoon']      = $eventSoon->where(function($query) use($searchMemberByid, $listMemberJoined){
                                        $query->where('member_id', $searchMemberByid);
                                        $query->orWhereIn('member_id', $listMemberJoined);
                                    })->get();

            $data['app']            = $app->where(function($query) use($searchMemberByid, $listMemberJoined){
                                        $query->where('member_id', $searchMemberByid);
                                        $query->orWhereIn('member_id', $listMemberJoined);
                                    })->get();

            $productCategoryIds = ProductCategory::whereIn('product_id', $data['app']->pluck('id'))->pluck('meta_product_category_id');

            $data['metaProduct']    = $metaProduct->withCount(['category' => function($q) use($data){
                                        $q->whereIn('product_id', $data['app']->pluck('id'));
                                    }])->with(['category' => function($q) use($data){
                                        $q->whereIn('product_id', $data['app']->pluck('id'));
                                    }])->whereIn('id', $productCategoryIds)->get();
        }

        // dd($data);
        
        $data['pengguna'] = $pengguna->get();

        $data['chart']= $chart->build();
        $data['endEvent']= $endEvent->build();
        $data['nowEvent']= $nowEvent->build();
        $data['totalEvent'] = $totalEvent->build();
        $data['incomingEvent'] = $incomingEvent->build();
        $data['grafik']= $grafik->build();
        $data['grafikMemberEvent'] = $grafikMemberEvent->build();
        $data['ongoingEvent'] = $ongoingEvent->build();
        $data['doneEvent'] = $doneEvent->build();
        $data['upcomingEventMember'] = $upcomingEventMember->build();
        $data['totalEventMembers'] = $totalEventMembers->build();

        $data['desaBar'] = $technoBar->build();
        $data['desaDone'] = $technoParkDone->build();

        $data['desaUpcoming'] = $technoUpcoming->build();

        $data['desaTotal'] = $technoTotal->build();
        
        return view('adminpage.content.dashboard.index', $data);
    }


    public function datatable(Request $request){
        $data = Blog::with(['category.meta_name', 'member.member_core','admin']);
        
        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id)->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }

        $data = $data->limit(10)->get();

        return DataTables::of($data)->make();

    }

}