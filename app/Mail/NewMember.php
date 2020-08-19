<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMember extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $data)
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
            ->from(env('MAIL_USERNAME', 'edwardthemangare@gmail.com')) // ganti <username> dengan username akun Gmail Anda.
            ->view('mail.newmember')
            ->withSwiftMessage(function($message) {
                $message
                    ->getHeaders()
                    ->addTextHeader('Rumah Cerdas Tirta Cendikia', 'Rumah Cerdas Tirta Cendikia');
            });
    }
}
