<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\MetaBlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpage.content.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage.content.blog.create');
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
            'title' => 'required',
            'desc'  => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
            'banner_image.*' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }
 
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->with('error', $validator->errors()->first())
        //         ->withInput();
        // }

        try {
            DB::beginTransaction();

            if(count($request->allFiles()) > 0){
                
                foreach ($request->allFiles() as $key => $item) {
                    $files[$key] = $request->file($key);
                }

                foreach($files as $key => $item){
                    $path = 'files/blogs/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }

            $blog = Blog::updateOrCreate(
            [ 'id' => $request->id ],
            [
                'member_id'         => getRoleName() == 'admin' ? null : Auth::user()->member->id,
                'admin_id'          => getRoleName() == 'admin' ? Auth::user()->admin->id : null,
                'member_type_id'    => getRoleName() == 'admin' ?
                                            MemberType::where('name', 'Kemenprim')->first()->id 
                                            : Auth::user()->member->member_type_id,
                'title'             => $request->title,
                'desc'              => $request->desc,
                'is_approved'       => isAutoApprove(),
            ]+$image);
            
            foreach(($request->category_id ?? []) as $item){
                BlogCategory::create([
                    'blog_id'               => $request->id ?: $blog->id,
                    'meta_blog_category_id' => $item
                ]);
            }

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($files as $key => $file){
                    $file->move($path, $nameFiles[$key]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('blog.index')->with('success', 'Success create Blog Post!');
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

        $data['blog'] = Blog::with(['category.meta_name'])->find($id);

        return view('adminpage.content.blog.edit', $data);
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
            'title' => 'required',
            'desc'  => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
            'banner_image.*' => 'image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            if(count($request->allFiles()) > 0){
                
                foreach ($request->allFiles() as $key => $item) {
                    $files[$key] = $request->file($key);
                }
                
                foreach($files as $key => $item){
                    $path = 'files/blogs/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }

            $blog = Blog::find($id);
            $blog->update(
            [
                'title'             => $request->title,
                'desc'              => $request->desc,
            ]+$image);

            BlogCategory::where('blog_id', $id)->delete();
            
            foreach(($request->category_id ?? []) as $item){
                BlogCategory::create([
                    'blog_id'               => $id,
                    'meta_blog_category_id' => $item
                ]);
            }

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($files as $key => $file){
                    $file->move($path, $nameFiles[$key]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('blog.index')->with('success', 'Success create Blog Post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::where('blog_id', $id)->delete();
        Blog::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Blog Post!',
        ]);
    }

    public function datatable(Request $request){
        // dd(Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        $data = Blog::with(['category.meta_name', 'member.member_core']);

        if(getRoleName() == 'member'){
            $data = $data->where('member_id', auth()->user()->member->id)->orWhereIn('member_id', Member::where('registered_by_member_id', Auth::user()->member->id)->pluck('id'));
        }
        
        $data = $data->get();
        return DataTables::of($data)->make();

    }

    public function approval(Request $request)
    {
        Blog::find($request->id)->update([
            'is_approved'   => $request->state,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Blog Post!',
        ]);
    }
}
