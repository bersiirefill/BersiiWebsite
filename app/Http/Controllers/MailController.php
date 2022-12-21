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
            'title' => 'Anda telah mengajukan pemulihan password',
            'body' => 'Halo '.$nama.', kode verifikasi pemulihan password anda adalah '.$kode.''
        ];
        Mail::to($email)->send(new SupportMail($mailData));
        // dd("Email is sent successfully.");
        return true;
    }
}
