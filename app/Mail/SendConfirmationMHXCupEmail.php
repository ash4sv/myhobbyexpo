<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendConfirmationMHXCupEmail extends Mailable
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
            subject: 'Confirmation Registration of Mini 4WD MHX CUP 2023',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'front.mhxcup.SendConfirmationMhxEmail',
            with: [
                'uniq'                      => $this->pdfData['uniq'],
                'full_name'                 => $this->pdfData['full_name'],
                'identification_card_number' => $this->pdfData['identification_card_number'],
                'group'                     => $this->pdfData['group'],
                'email'                     => $this->pdfData['email'],
                'phone_number'              => $this->pdfData['phone_number'],
                'create_date'               => $this->pdfData['create_date'],
                'category'                  => $this->pdfData['category'],
                'registration'              => $this->pdfData['registration'],
                'price_category'            => $this->pdfData['price_category'],
                'total_cost'                => $this->pdfData['total_cost'],
                'runNum'                    => $this->pdfData['runNum'],
                'nickname'                  => $this->pdfData['nickname'],
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
        $attachment = $this->pdfData['uniq'].'_'.strtoupper($this->pdfData['nickname']).'.pdf';
        $file = public_path('assets/upload/').$attachment;

        return [
            Attachment::fromPath($file)->as($this->pdfData['uniq'].'_'.strtoupper($this->pdfData['nickname']).'.pdf')->withMime('application/pdf'),
        ];
    }
}
