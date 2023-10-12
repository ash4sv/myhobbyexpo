<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

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

        // Function to open the PDF file
        function openPdfFile($filePath) {
            try {
                return Storage::get($filePath);
            } catch (\Exception $e) {
                // Handle any exceptions, e.g., log or return an error message.
                return $e->getMessage();
            }
        }
        // Your code to attach the PDF to an email
        $attachmentPath = 'assets/upload/'.$attachment; // This should be the full path to the PDF file.

        $pdfContent = openPdfFile($attachmentPath);

        if (is_string($pdfContent)) {
            return $pdfContent;
        }

        return [
            Attachment::new($pdfContent, $attachment)->mimeType('application/pdf'),
        ];
    }
}
