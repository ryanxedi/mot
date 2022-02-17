<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $registration;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $registration)
    {
        $this->email = $email;
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your MOT is due in 30 days')
            ->markdown('mail.reminder');
    }
}
