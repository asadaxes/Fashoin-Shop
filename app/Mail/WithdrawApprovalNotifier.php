<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawApprovalNotifier extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $username;
    public $method;
    public $receiver;
    public $amount;
    public $amount_to_sent;

    public function __construct($subject, $username, $method, $receiver, $amount, $amount_to_sent)
    {
        $this->subject = $subject;
        $this->username = $username;
        $this->method = $method;
        $this->receiver = $receiver;
        $this->amount = $amount;
        $this->amount_to_sent = $amount_to_sent;
    }

    public function build()
    {
        return $this->subject($this->subject)->view('emails.withdraw_approval');
    }
}