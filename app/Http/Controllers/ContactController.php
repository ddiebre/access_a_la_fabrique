<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
 
class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
 
    public static function store($userMail, $userName, $verificationCode)
    {
        $infos = ['name'=>$userName, 'code'=>$verificationCode];
        Mail::to($userMail)->send(new Contact($infos));
    }
}