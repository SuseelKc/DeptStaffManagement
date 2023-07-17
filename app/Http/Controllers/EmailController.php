<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Mail\GetMails;

class EmailController extends Controller
{
    public function contactpage()
    {
        return view('contactpage');
    }

    public function sendEmail(Request $request)
    {
        Mail::send([], [], function (Message $message) use ($request) {
            $name = session('staff');
            $message->from($request->email, $name);
            $message->to('sushil.np.khatri@gmail.com');
            $message->subject($request->title);
            // Set the email body as HTML
            $message->html('<p>' . nl2br(e($request->description)) . '</p>');
        });

        // Redirect to a staffs home page
        return redirect(route('staffhome'))->with(
            'success',
            "Mail Sent Successfully"
        );
    }
    public function staffhome()
    {
        return view('staff.home');
    }
}
