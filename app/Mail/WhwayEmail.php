<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Whway;
use Illuminate\Queue\SerializesModels;

class WhwayEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $whway;

    public function __construct(Whway $whway)
    {
        $this->whway = $whway;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("support@hotwheelsindo.com")->view('whway-email-template');
    }
}
