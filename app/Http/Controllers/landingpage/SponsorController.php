<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Sponsor;
use App\Models\AppConfig;
use App\Models\MemberType;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class SponsorController extends Controller
{
    public function index()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $member_type = MemberType::where('name','!=','Kemenprim')->get();
        $count = Sponsor::count();

        $sponsor = Sponsor::paginate(12);
        
        return view('landing-page.sponsor.index', compact('sponsor','count','app','user','member_type'));
    }

    public function register()
    {
        return view('landing-page.sponsor.register-sponsor');
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required|numeric',
            'email'     =>'required|email|unique:sponsors',
            'image'     => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            if (count($request->allFiles()) > 0) {

                foreach ($request->allFiles() as $key => $item) {
                    $files[$key] = $request->file($key);
                }

                foreach ($files as $key => $item) {
                    $path = 'files/sponsors/image/';
                    $nameFile = md5($item->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $item->getClientOriginalExtension();

                    $image[$key] = $path . $nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            } else {
                $image = [];
            }

            $member = Sponsor::Create(
                [
                  'name' => $request->name,
                  'phone' => $request->phone,
                  'email' => $request->email,
                  'desc' => $request->desc,
                  'is_approved' => false,
                ]+$image);

            if (count($request->allFiles()) > 0) {
                if (!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach ($files as $key => $file) {
                    $file->move($path, $nameFiles[$key]);
                }
            }

            Mail::send('mail.notification', ['member' => $member], function($mail) use($request) {
                $mail->subject('Thank You for Joining Us!');
                $mail->to($request->email, $request->name);
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('home.index')->with('success', 'Success Joined Sponsor!');
    }
}
