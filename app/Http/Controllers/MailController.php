<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\SupportMail;

class MailController extends Controller
{
    //
    public static function index($nama, $email, $kode)
    {
        $mailData = [
            'title' => 'Anda telah mengajukan pemulihan kata sandi',
            'body' => 'Halo '.$nama.', kode verifikasi pemulihan kata sandi anda adalah '.$kode.''
        ];
        Mail::to($email)->send(new SupportMail($mailData));
        // dd("Email is sent successfully.");
        return true;
    }
}
