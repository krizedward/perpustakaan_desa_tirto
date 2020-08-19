<?php

namespace App\Mail;

use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BorrowPending extends Mailable
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
            ->from(env('MAIL_USERNAME', 'edwardthemangare@gmail.com')) // ganti <username> dengan username akun Gmail Anda.
            ->view('mail.borrowpending')
            ->withSwiftMessage(function($message) {
                $message
                    ->getHeaders()
                    ->addTextHeader('Rumah Cerdas Tirta Cendikia', 'Rumah Cerdas Tirta Cendikia');
            });
            /*->attach('/uploads/'.$this->data->codebook->book->image_cover, [
                'as' => 'book_image.jpg',
                'mime' => 'image/jpeg',
            ]);*/
    }
}
