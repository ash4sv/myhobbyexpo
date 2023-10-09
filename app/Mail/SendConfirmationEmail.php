<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $pdfData;

    /**
     * Create a new message instance.
     */
    public function __construct($pdfData)
    {
        $this->pdfData = $pdfData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Confirmation Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'web.emails.send-confirmation-email',
            with: [
                'vendor'  => $this->pdfData['vendor'],
                'invDate' => $this->pdfData['invDate'],
                'ref'     => $this->pdfData['ref'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachment = $this->pdfData['ref'].'.pdf';

        return [
            Attachment::fromPath(public_path('assets/upload/'.$attachment))->as($attachment)->withMime('application/pdf'),
        ];
    }
}
