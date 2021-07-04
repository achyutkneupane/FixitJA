<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateProfile extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $request,$user_subcategories,$subject,$city;
    public function __construct($request,$user_subcategories,$city,$subject)
    {
        $this->request = $request;
        $this->user_subcategories = $user_subcategories;
        $this->subject = $subject;
        $this->city = $city;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.createProfile')
                    ->subject($this->subject)
                    ->with('request',$this->request)
                    ->with('subject',$this->subject)
                    ->with('city',$this->city)
                    ->with('user_subcategories',$this->user_subcategories);
    }
}
