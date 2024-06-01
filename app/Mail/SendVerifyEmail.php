<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendVerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

 public static $toMailCallback;

    // public $notifiable;
    public $hashUrl;
    /**
     * Create a new message instance.
     */
    public function __construct($hashUrl){
        // $this->notifiable = $notifiable;
        // $this->onQueue('sendEmail');
        $this->hashUrl = $hashUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = __('messages.Verify-Email-Address');
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->hashUrl);
        return new Content(
            markdown: 'mail.verify.email',
            with: [
                'hashUrl' => $this->hashUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
