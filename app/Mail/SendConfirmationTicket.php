<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendConfirmationTicket extends Mailable
{
    use Queueable, SerializesModels;

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
            subject: 'Confirmation MHX 2023 Ticket',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'front.participant.SendConfirmationTicketEmail',
            with: [
                'visitors' => $this->pdfData['visitor'],
                'carts' => $this->pdfData['carts'],
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
        $attachment = $this->pdfData['visitor']['uniq'] . '_' . json_decode($this->pdfData['visitor']['visitor'])['identification_card_number'] . '.pdf';
        $file = public_path('assets/upload/').$attachment;

        return [
            Attachment::fromPath($file)->as($attachment)->withMime('application/pdf'),
        ];
    }
}
