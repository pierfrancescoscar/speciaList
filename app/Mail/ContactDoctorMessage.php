<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactDoctorMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact')
                    ->with(
                    [
                    'name' => $this->contact,
                    // 'surname' => $this->contact->surname,
                    // 'email' => $this->contact->email,
                    // 'object' => $this->contact->object,
                    // 'content' => $this->contact->content,
                    ]
                        );
    }
}
