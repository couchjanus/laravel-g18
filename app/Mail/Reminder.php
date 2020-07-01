<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public $event;
    public $contact;

    public function __construct($event)
    {
        $this->event = $event;
        $this->contact = "Foo Bar";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // return $this->from("hello@app.com", "From Cool Application")
        //     ->subject("Remember Me!")
        //     ->view("emails.reminder")
        //     ->text('emails.reminder_plain');

        // return $this->from('hello@app.com', 'Ваше приложение')
        //     ->subject('Напоминание о событии: ' . $this->event)
        //     ->view('emails.reminder')
        //     ->text('emails.reminder_plain');

        return $this->from('hello@app.com', 'Ваше приложение')
            ->subject('Напоминание о событии: ' . $this->event)
            ->view('emails.reminder')
            ->text('emails.reminder_plain')
            ->with(['contact' => $this->contact]);
    }
}
