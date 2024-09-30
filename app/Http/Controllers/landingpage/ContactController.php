<?php

namespace App\Http\Controllers\landingpage;

use App\Models\AppConfig;
use Illuminate\Http\Request;
use App\Models\ContactBanner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $app = AppConfig::first();
        $user = auth()->id();
        $contact = ContactBanner::all();
        return view('homepage.content.contact.index',compact('app','contact','user'));
    }

    public function sendMessage(Request $request)
    {
        try{
            $app = AppConfig::first();
            
            Mail::send('mail.admin-contact', ['request' => $request], function($mail) use($app, $request) {
                $mail->subject($request->name .' Send you a message!');
                $mail->to($app->email);
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return 'Berhasil mengirim pesan, terimakasih!';
    }
}
