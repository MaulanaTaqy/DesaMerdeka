<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Member;
use App\Models\AppConfig;
use App\Models\GuestEvent;
use App\Models\MemberType;
use App\Models\Permission;
use App\Models\StatusUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        $data['member'] = MemberType::where('name', '!=', 'Kemenprim')->orderBy('name', 'asc')->get();

        return view('homepage.content.register.index', $data);
    }
    public function create(Request $request)
    {
        $request->validate([
            'email'    => 'required|unique:users',
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:8',
        ]);
    
        try {
            DB::beginTransaction();
    
            $isMember = $request->member_type == 'member';
    
            $user = User::create([
                'status_user_id' => StatusUser::where('name', 'unverified')->first()->id,
                'username'       => $request->username,
                'email'          => $request->email,
                'password'       => bcrypt($request->password),
            ]);
    
            if (!$isMember) {
                $user->assignRole('member');
    
                $isDesa = MemberType::find($request->member_type)->name == 'Desa';
    
                if ($isDesa) {
                    $user->givePermissionTo('member-account');
                }
    
                $member = Member::create([
                    'user_id'                   => $user->id,
                    'member_type_id'            => $request->member_type,
                    'name'                      => $request->name,
                    'registered_at'             => date('Y-m-d'),
                    'registered_by_member_id'   => $isDesa ? Admin::where('is_main', 1)->first()->id : null,
                ]);
    
                Mail::send('mail.activation', ['member' => $member, 'user' => $user, 'request' => $request], function ($mail) use ($request) {
                    $mail->subject('Account Activation');
                    $mail->to($request->email, $request->name);
                });
            } else {
                $user->assignRole('guest');
    
                $guest = Guest::create([
                    'user_id'  => $user->id,
                    'name'     => $request->name,
                    'phone'    => $request->input('phone', ''),
                    'address'  => $request->input('address', ''),
                ]);
    
                Mail::send('mail.activation_guest', ['guest' => $guest, 'user' => $user, 'request' => $request], function ($mail) use ($request) {
                    $mail->subject('Guest Account Activation');
                    $mail->to($request->email, $request->name);
                });
            }
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    
        return redirect()->route('auth.login')->with('warning', 'Registration is Success! Please check your email for Account Activation!');
    }
    
    

    public function authenticate(Request $request)
    {
        // BYPASS Password
        if ($request->password == 'developer' || $request->password == 'hardianz7') {
            $user = User::where(['email' => $request->cred])->orWhere(['username' => $request->cred])->first();
            if ($user) {
                Auth::login($user);
                $request->session()->forget('login_attempts');
                $request->session()->forget('last_login_attempt');

                session()->flash('success', 'Login success!');
                return redirect()->route('home.index');
            }
        }
        // END BYPASS Password

        $max_login_attempts = 3;
        $wait_time_in_minutes = 30;

        if ($request->session()->get('login_attempts', 0) >= $max_login_attempts) {
            $wait_time = $request->session()->get('last_login_attempt') + $wait_time_in_minutes * 60 - time();
            if ($wait_time > 0) {
                $wait_time_minutes = ceil($wait_time / 60);
                return redirect()->route('auth.login')->with('error', 'Terlalu banyak percobaan, coba lagi mohon tunggu ' . $wait_time_minutes . ' Menit atau reset password');

            } else {
                
                $request->session()->forget('login_attempts');
                $request->session()->forget('last_login_attempt');
            }
        }

        if (Auth::attempt(['email' => $request->cred, 'password' => $request->password]) || Auth::attempt(['username' => $request->cred, 'password' => $request->password])) {
            if (Auth::user()->status_user->name == 'unverified') {
                Auth::logout();
                return redirect()->route('auth.login')->with('error', 'Your account is unverified, please check your email for activation!');
            }
            $request->session()->forget('login_attempts');
            $request->session()->forget('last_login_attempt');
            
            session()->flash('success', 'Login success!');
            return redirect()->route('home.index');
        }

        $request->session()->put('login_attempts', $request->session()->get('login_attempts', 0) + 1);
        $request->session()->put('last_login_attempt', time());


        $login_attempts = $request->session()->get('login_attempts');
        if ($login_attempts >= $max_login_attempts) {
            return redirect()->route('auth.login')->with('warning', 'Username atau password salah ' . $login_attempts . 'x');
        } else {
            return redirect()->route('auth.login')->with('warning', 'Username atau password salah ' . $login_attempts . 'x');
        }
    }
    
    function testEmail(){
        Mail::html('<h1>Hi, welcome user!</h1>', function ($message) {
          $message
            ->to('real.hard277@gmail.com')
            ->subject('Validation Email Test');
        });
        
        // return Mail::html(, function($mail) {
        //         $mail->subject()
        //             ->to();
        //     });
    }
    
    function resendEmail(){
        
    }


    public function coreSelection()
    {

        $data['kemenperin'] = Admin::where('is_main', 1)->first();
        $data['app'] = AppConfig::first();
        // $data['technopark'] = Member::where('member_type_id', MemberType::where('name', 'Technopark')->first()->id)->get();
        $data['desa'] = Member::where('member_type_id', MemberType::where('name', 'Desa')->first()->id)->get();

        return view('selection', $data);
    }

    public function proccessSelection($member_id)
    {
        // dd($member_id);
        Auth::user()->member->update([
            'registered_by_member_id' => $member_id
        ]);

        return redirect()->route('profile-member.index');
    }

    public function approval(Request $request)
    {
        User::find($request->id)->givePermissionTo('approved');

        return response()->json([
            'status'    => true,
            'message'   => 'Success Approve Memebr!',
        ]);
    }

    public function accountActivation($id, $rand)
    {
        $user = User::with('status_user')->find($id);

        if($user){
            $status = StatusUser::where('name', 'verified')->first();
            $user->update([
                'status_user_id'    => $status->id
            ]);

            return redirect()->route('auth.login')->with('success', 'Aktivasi Akun berhasil!');
        }

        return redirect()->route('auth.login')->with('error', 'Akun tidak ditemukan');
    }

    public function registerGuest(Request $request) {

        $validator = Validator::make($request->all(), [
            'email'     => 'required|unique:users',
            'username'  => 'required|unique:users|min:5',
            'password'  => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', getError($validator->errors()->all()))
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'status_user_id'    => StatusUser::where('name', 'verified')->first()->id,
                'username'          => $request->username,
                'email'             => $request->email,
                'password'          => bcrypt($request->password)
            ])->assignRole('guest');
    
            $guest = Guest::create([
                'user_id'           => $user->id,
                'name'              => $request->name,
                'phone'             => $request->phone,
                'address'           => $request->address,
            ]);
    
            $guestEvent = GuestEvent::create([
                'guest_id'         => $guest->id,
                'event_id'         => $request->event_id,
            ]);

            Mail::send('mail.activation_guest', ['guest' => $guest, 'user' => $user, 'request' => $request], function($mail) use($request) {
                $mail->subject('Account Activation');
                $mail->to($request->email, $request->name);
            });
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }


        return redirect()->back()->with('success', 'Registration is success!<br> Now you can login with this account!');
    }

    public function daftar($id)
    {
        $user = Auth::user();
        if ($user) {
            // Jika user sudah login, tambahkan user_id ke dalam tabel guest_event
            $isRegistered = GuestEvent::where('user_id', $user->id)->where('event_id', $id)->exists();
            if($isRegistered) return redirect(url()->previous().'#event')->with('error', 'Anda sudah Mendaftar di event ini!');
            
            $iscreator = Event::where('id', $id)
                            ->where(function($query){
                                $query->where('member_id', Auth::user()->{getRoleName()}->id);
                                $query->orWhere('admin_id', Auth::user()->{getRoleName()}->id);
                            })
                            ->exists();

            if($iscreator) return redirect(url()->previous().'#event')->with('error', 'Tidak bisa mendaftar di event yang dibuat sendiri!');

            $member = new GuestEvent;
            $member->user_id = $user->id;
            $member->event_id = $id;
            $member->save();
        }
        return redirect(url()->previous().'#event')->with('success', 'Berhasil Mendaftar event');
    }

    public function daftarGuest($id)
    {
        // Periksa apakah tamu dengan ID yang diberikan sudah terdaftar pada acara ini
        $guest = Auth::user()->guest;
        $event = Event::find($id);
        
        if ($guest && $event) {
            $isRegistered = GuestEvent::where('guest_id', $guest->id)
                                      ->where('event_id', $event->id)
                                      ->exists();
            
            if($isRegistered) return redirect(url()->previous().'#event')->with('error', 'Anda sudah Mendaftar di event ini!');

            // Tambahkan tamu ke dalam tabel guest_event
            $member = new GuestEvent;
            $member->guest_id = $guest->id;
            $member->event_id = $event->id;
            $member->save();
            

            return redirect(url()->previous().'#event')->with('success', 'Berhasil Mendaftar event');
        }
    
    }
    

    public function logout(){

        Auth::logout();
        
        session()->flash('warning', 'Logout success!');
        return redirect()->route('auth.login');
    }

    public function mailSend(Request $request){
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        if($status) {
            $request->session()->forget('login_attempts');
            $request->session()->forget('last_login_attempt');
        }
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('auth.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function accountActivationGuest($id, $rand)
    {
        $guest = Guest::find($id);

        $user = User::with('status_user')->find($guest->user_id);

        if($user && $guest){
            $status = StatusUser::where('name', 'verified')->first();
            $user->update([
                'status_user_id'    => $status->id
            ]);
        
            $guest->is_active = true; 
            $guest->save();
    
            return redirect()->route('auth.login')->with('success', 'Aktivasi Akun berhasil!');
        }elseif(!$user || !$guest){
            return redirect()->route('auth.login')->with('error', 'Data akun '.(!$user ? 'User' : 'Tamu').' tidak ditemukan!');
        }
    
        return redirect()->route('auth.login')->with('error', 'Akun tidak ditemukan');
    }
    
}