<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DevideShareWithNotExsistingUserEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $shareWith;
    protected $sharedBy;
    protected $userPassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shareWith, $sharedBy, $userPassword)
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
        return $this->view('emails/devide_share_with_not_exsisting_user_email')->with(['shareWith' => $this->shareWith, 'sharedBy'=> $this->sharedBy,'password'=>$this->userPassword ]);
    }
}
