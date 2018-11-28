<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;
    protected $email;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @param $feedback
     * @param $email
     * @param $message
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@gmail.com')
            ->view('mails.feedback')
            ->text('mails.feedback_plaint')
            ->with([
                'email' => $this->email,
                'message' => $this->message
            ]);
    }
}
