<?php

namespace App\Http\Controllers;

use App\Models\AppConfig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AppConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appConfig = AppConfig::all()->first();

        return view('adminpage.content.management-homepage.homepage-contact.index', compact('appConfig'));
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
        $validator = Validator::make($request->all(), [
            'logo_app' => 'image|mimes:jpeg,jpg,png,JPG,JPEG,PNG',
            'short_about_image' => 'image|mimes:jpeg,jpg,png,JPG,JPEG,PNG',
        ] , [
            'logo_app.required' => 'Mohon upload file logo aplikasi',
            'logo_app.image' => 'File yang diupload harus berupa gambar',
            'logo_app.mimes' => 'Format file image yang diizinkan untuk logo aplikasi jpeg, jpg, png',
            'short_about_image.required' => 'Mohon upload file gambar tentang aplikasi',
            'short_about_image.image' => 'File yang diupload harus berupa gambar',
            'short_about_image.mimes' => 'Format file image yang diizinkan untuk gambar tentang aplikasi jpeg, jpg, png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        if (count($request->allFiles()) > 0) {

            foreach ($request->allFiles('logo_app') as $key => $item) {
                $files[$key] = $request->file($key);
            }

            foreach ($files as $key => $item) {
                $path = 'files/app-config/logo-app/';
                $nameFile = md5($item->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $item->getClientOriginalExtension();

                $image[$key] = $path . $nameFile;
                $nameFiles[$key] = $nameFile;
            }
        } else {
            $image = [];
        }
        $appConfig = AppConfig::first();
        
        if ($request->type == "shortAbout") {
            $reqBody = [
                'short_about_title'     => $request->short_about_title ?? optional($appConfig)->short_about_title ?? null,
                'short_about_desc'      => $request->short_about_desc ?? optional($appConfig)->short_about_desc ?? null,
            ];
        }else{
            $reqBody = [
                'title'                 => $request->title ?? optional($appConfig)->title ?? null,
                'sub_title'             => $request->sub_title ?? optional($appConfig)->sub_title ?? null,
                'desc'                  => $request->desc ?? optional($appConfig)->desc ?? null,
                'address'               => $request->address ?? optional($appConfig)->address ?? null,
                'email'                 => $request->email ?? optional($appConfig)->email ?? null,
                'phone'                 => $request->phone ?? optional($appConfig)->phone ?? null,
                'fb_url'                => $request->fb_url ?? optional($appConfig)->fb_url ?? null,
                'ig_url'                => $request->ig_url ?? optional($appConfig)->ig_url ?? null,
                'yt_url'                => $request->yt_url ?? optional($appConfig)->yt_url ?? null,
                'twt_url'               => $request->twt_url ?? optional($appConfig)->twt_url ?? null,
                'tk_url'                => $request->tk_url ?? optional($appConfig)->tk_url ?? null,
                'gmap_url'              => $request->gmap_url ?? optional($appConfig)->gmap_url ?? null,
                'url_vidio_banner_yt'   => $request->link_vid_banner_yt,
            ];
        }

        // [
        //     'title'                 => $request->title ?? optional($appConfig)->title ?? null,
        //     'sub_title'             => $request->sub_title ?? optional($appConfig)->sub_title ?? null,
        //     'desc'                  => $request->desc ?? optional($appConfig)->desc ?? null,
        //     'short_about_title'     => $request->short_about_title ?? optional($appConfig)->short_about_title ?? null,
        //     'short_about_desc'      => $request->short_about_desc ?? optional($appConfig)->short_about_desc ?? null,
        //     'address'               => $request->address ?? optional($appConfig)->address ?? null,
        //     'email'                 => $request->email ?? optional($appConfig)->email ?? null,
        //     'phone'                 => $request->phone ?? optional($appConfig)->phone ?? null,
        //     'fb_url'                => $request->fb_url ?? optional($appConfig)->fb_url ?? null,
        //     'ig_url'                => $request->ig_url ?? optional($appConfig)->ig_url ?? null,
        //     'yt_url'                => $request->yt_url ?? optional($appConfig)->yt_url ?? null,
        //     'twt_url'               => $request->twt_url ?? optional($appConfig)->twt_url ?? null,
        //     'tk_url'                => $request->tk_url ?? optional($appConfig)->tk_url ?? null,
        //     'gmap_url'              => $request->gmap_url ?? optional($appConfig)->gmap_url ?? null,
        //     'url_vidio_banner_yt'   => $request->link_vid_banner_yt,
        // ]

        AppConfig::updateorCreate(
        ['id'   => optional($appConfig)->id ?? null],
        $reqBody+$image);


        if (count($request->allFiles()) > 0) {
            if (!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
            foreach ($files as $key => $file) {
                $file->move($path, $nameFiles[$key]);
            }
        }


        return redirect()->back()->with('success', 'Success editing homepage contents');
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
        //
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
