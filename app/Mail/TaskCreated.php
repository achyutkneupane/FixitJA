<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email_data;
    public function __construct($request,$all_cats,$city,$site_city)
    {
        $this->email_data = collect();
        $this->email_data->put('request',$request);
        $this->email_data->put('all_cats',$all_cats);
        $this->email_data->put('city',$city);
        $this->email_data->put('site_city',$site_city);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.taskCreated')
                    ->subject('Task Confirmation')
                    ->with('email_data',$this->email_data);
    }
}
