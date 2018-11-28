<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * @param MailRequest $mailRequest
     */
    public function sendMail(MailRequest $mailRequest)
    {
        $mail = new \stdClass();
        $mail->email = $mailRequest->email;
        $mail->message = $mailRequest->message;
        $mail->sender = 'Admin';

        Mail::to("feedback@blog.info")->send(new ContactUs($mail));
    }
}
