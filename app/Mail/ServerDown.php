<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServerDown extends Mailable
{
    use Queueable, SerializesModels;
    public $data,$name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$name)
    {
        $this->data = $data;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $name = $this->name;
        return $this->subject('Server down')->view('mail.server-down',compact('data','name'));
    }
}
