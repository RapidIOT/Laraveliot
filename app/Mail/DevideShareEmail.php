<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DevideShareEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $shareWith;
    protected $sharedBy;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shareWith, $sharedBy)
    {
        //
        $this->shareWith= $shareWith;
        $this->sharedBy= $sharedBy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/device_share')->with(['shareWith' => $this->shareWith, 'sharedBy'=> $this->sharedBy]);
    }
}
