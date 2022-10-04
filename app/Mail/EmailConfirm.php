<?php

namespace App\Mail;

use App\Models\User;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EmailConfirm extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private User $user)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tt = new DateTime();
        $tt->modify('+1 day');

        $link = URL::temporarySignedRoute(
            'verify.email',
            $tt,
            [
                'id' => $this->user->id,
                'hash' => sha1($this->user->email),
            ]
        );

        return
            $this->subject('Please confirm your email!')
                 ->view('emails.email_confirm', ['name' => $this->user->name, 'link' => $link]);
    }
}
