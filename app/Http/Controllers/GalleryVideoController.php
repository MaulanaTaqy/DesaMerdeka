<?php

namespace App\Http\Controllers;

use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class GalleryVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            DB::beginTransaction();

            if(count($request->video_url) > 0){
                foreach($request->video_url as $key => $item){
                    if($item != null || $item != ''){
                        try {
                            parse_str( parse_url( $item, PHP_URL_QUERY ), $my_array_of_vars );
                            $dns = explode("/", $item);
                            if (isset($dns[2]) && $dns[2] == 'www.youtube.com')  {
                                $thumbnailUrl = "https://img.youtube.com/vi/".$my_array_of_vars['v']."/hqdefault.jpg";
                                GalleryVideo::create([
                                    'gallery_id'        =>$request->gallery_id,
                                    'video'             => $item,
                                    'video_thumbnail'   => $thumbnailUrl
                                ]);
                            } 
                        
                            else {
                                return response()->json([
                                    'status'    => false,
                                    'message'   => 'Link video is not valid!',
                                ]);
                            }
                        } catch (\Exception $e) {
                            return response()->json([
                                'status'    => false,
                                'message'   => 'Link video is not valid!',
                            ]);
                        }
                    }
                }
            }
                
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Video Url!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL)
    {
        return view('adminpage.content.management-homepage.gallery.videos', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        return response()->json([
            'data'  =>GalleryVideo::find($id)
        ]);
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
        try {
            DB::beginTransaction();
            if ($request->has('video_url') != null || $request->has('video_url') != '') {
                $item = $request->video_url;
                try {
                    parse_str(parse_url($item, PHP_URL_QUERY), $my_array_of_vars);
                    $dns = explode("/", $item);
                    if (isset($dns[2]) && $dns[2] == 'www.youtube.com') {
                        $thumbnailUrl = "https://img.youtube.com/vi/" . $my_array_of_vars['v'] . "/hqdefault.jpg";
                        GalleryVideo::findOrFail($id)->update([
                            'video'             => $request->video_url,
                            'video_thumbnail'   => $thumbnailUrl,
                        ]);
                    } else {
                        return response()->json([
                            'status'    => false,
                            'message'   => 'Link video is not valid!',
                        ]);
                    }
                } catch (\Exception $e) {
                    return response()->json([
                        'status'    => false,
                        'message'   => 'Error : '.$e->getMessage().'!',
                    ]);
                }
            }
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    
        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Video Url!',
        ]);
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GalleryVideo::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Video Url!',
        ]);
    }

    public function datatable(Request $request, $id = null)
    {
        $data = GalleryVideo::where('gallery_id', $id)->with(['gallery'])->get();
    
        return DataTables::of($data)->make();
    }
}
