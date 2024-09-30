<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Guide::all();
        return view('adminpage.content.help.panduan.index');
    }

    public function indexRegis()
    {
        $registrasi = Guide::where('type', '=', 'registrasi')->first();
        return view('adminpage.content.help.panduan.regis.index',compact('registrasi'));
    }

    public function indexUpload()
    {
        $upload = Guide::where('type', '=', 'upload')->first();
        return view('adminpage.content.help.panduan.upload.index',compact('upload'));
    }

    public function indexApp()
    {
        $app = Guide::where('type', '=', 'app')->first();
        return view('adminpage.content.help.panduan.app.index',compact('app'));
    }

    public function indexBerita()
    {
        $berita = Guide::where('type', '=', 'berita')->first();
        return view('adminpage.content.help.panduan.berita.index',compact('berita'));
    }

    public function indexMail()
    {
        $mail = Guide::where('type', '=', 'mail')->first();
        return view('adminpage.content.help.panduan.mail.index',compact('mail'));
    }

    public function indexChat()
    {
        $chat = Guide::where('type', '=', 'chat')->first();
        return view('adminpage.content.help.panduan.chat.index', compact('chat'));
    }

    public function indexAktivasi()
    {
        $aktivasi = Guide::where('type', '=', 'aktivasi')->first();
        return view('adminpage.content.help.panduan.aktivasi.index',compact('aktivasi'));
    }

    public function indexDashboard()
    {
        $dashboard = Guide::where('type', '=', 'dashboard')->first();
        return view('adminpage.content.help.panduan.dashboard.index',compact('dashboard'));
    }




    public function store(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'desc' => 'required',
        ]);
        // dd($validator);
        // dd(request()->all());
       
    
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        } else {
            $guide = Guide::updateOrCreate(
                [ 'id' => $request->id ],
                [
                'type' => $request->type,
                'desc' => $request->desc
                ]
            );
            
        
            return redirect()->back()->with('success', 'Success update Guide!');
        }
    }
}