<?php

namespace App\Mail;

use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BorrowPendingDenied extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Borrow $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('MAIL_USERNAME', '<username>@gmail.com')) // ganti <username> dengan username akun Gmail Anda.
            ->view('mail.borrowpendingdenied')
            ->withSwiftMessage(function($message) {
                $message
                    ->getHeaders()
                    ->addTextHeader('Custom-Header', 'HeaderValue');
            });
    }
}
