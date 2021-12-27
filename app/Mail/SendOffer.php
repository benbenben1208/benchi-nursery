<?php

namespace App\Mail;

use App\Models\CorporationJoboffer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOffer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $job;

    public function __construct(CorporationJoboffer $job)
    {
        $this->job = $job;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('あなたに企業からオファーが届いております。')
            ->view('emails.staff.offers');
    }
}

