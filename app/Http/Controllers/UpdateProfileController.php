<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProfileRequest;

class UpdateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        $datas = Auth::user()->{Auth::user()->getRoleNames()->first()};

        return view('profile.index', compact('datas', 'user'));
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
        //
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

    // public function update(Request $request, $id)
    // {

        public function update(Request $request, $id)
        {
            $type = $request->type;
            
            if ($type === 'profile') {
                
                $request->validate(
                    [
                        'image' => 'image|mimes:jpeg,jpg,png,webp,svg',
                    ],
                    [   'image.image' => 'Gambar Tidak Valid'
                    ]
                );
        
                if (count($request->allFiles()) > 0) {

                    foreach ($request->allFiles() as $key => $item) {
                        $files[$key] = $request->file($key);
                    }
    
                    foreach ($files as $key => $item) {
                        $path = 'files/kemenperin/image/';
                        $nameFile = md5($item->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $item->getClientOriginalExtension();
    
                        $image[$key] = $path . $nameFile;
                        $nameFiles[$key] = $nameFile;
                    }
                } else {
                    $image = [];
                }
    
                
                auth()->user()->{getRoleName()}->update([
                    'name'  => $request->name,
                ]+$image);
                    
                if (count($request->allFiles()) > 0) {
                    if (!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                    foreach ($files as $key => $file) {
                        $file->move($path, $nameFiles[$key]);
                    }
                }

            } elseif ($type === 'password') {

                $validator = Validator::make($request->all(), [
                    'oldPassword' => ($request->newPassword ? 'required' : ''),
                    'newPassword' => ($request->newPassword ? 'required|min:8' : ''),
                    'repeatPassword' => ($request->newPassword ? 'required|same:newPassword' : ''),
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->with('error', $validator->errors()->first())
                        ->withInput();
                }
                
                $user = User::find(Auth::user()->id);
                
                if($request->newPassword){
                    if (!Hash::check($request->oldPassword, $user->password)) {
                        return redirect()->back()->with('error', 'Old password in incorrect!');
                    }
                }
                
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $request->newPassword ? bcrypt($request->newPassword) : $user->password,
                ]);
            }

                return redirect()->back()->with('success', 'Success Update Profile!');
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
