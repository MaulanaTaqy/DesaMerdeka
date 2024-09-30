<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function donate(Request $request){
        $validator = Validator::make($request->all(), [
            'donation' => 'required_without:other',
            'other' => 'required_if:donation,null',
            'name' => 'required',
            'email' => 'required',
            'instance' => 'required',
            'no_telp' => 'required',
        ],[
            'donation.required_without' => 'Silahkan pilih nominal donasi',
            'other.required_if' => 'Silahkan pilih nominal donasi',
            'name.required' => 'Silahkan masukan nama Anda',
            'email.required' => 'Silahkan masukan alamat email Anda',
            'instance.required' => 'Silahkan masukan instansi Anda',
            'no_telp.required' => 'Silahkan masukan nomor telepon Anda',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            Mail::send('mail.donation', ['request' => $request], function($mail) use($request) {
                $mail->subject('Permintaan Donasi');
                $mail->to('donasi@desamerdeka.org', $request->name);
            });
    
            return redirect()->back()->with('success', 'Thank you for your donation!');
        } catch (\Throwable $th) {
            return redirect()->back()
            ->with('error', 'Something went wrong');
        }
    }
}
