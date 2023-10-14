<?php

namespace App\Mail;

use App\Models\Apps\BoothNumber;
use App\Models\Apps\Section;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
        $booth = collect($this->pdfData['dataPull']['booths']['id'])->filter(function ($value) {
            return $value === 'on';
        })->keys()->toArray();
        $booths = BoothNumber::whereIn('id', $booth)->get();

        return new Content(
            markdown: 'web.emails.send-confirmation-email',
            with: [
                'section'          => Section::where('id', $this->pdfData['dataPull']['section_id'])->first(),
                'booths'           => $booths,
                'dataPull'         => $this->pdfData['dataPull'],
                'vendorSubmitData' => $this->pdfData['vendorSubmitData'],
                'vendor'           => $this->pdfData['vendor'],
                'ref'              => $this->pdfData['ref'],
                'invDate'          => $this->pdfData['invDate'],
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
        $file = public_path('assets/upload/').$attachment;
        Log::info($file);

        return [
            /*Attachment::new('assets/upload/'. $attachment)->mimeType('application/pdf'),*/
            Attachment::fromPath($file)->as($this->pdfData['ref'].'.pdf')->withMime('application/pdf'),
        ];
    }
}
