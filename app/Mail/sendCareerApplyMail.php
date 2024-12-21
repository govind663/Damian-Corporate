<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendCareerApplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Career Apply Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.emails.career_apply_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        // Check if the resume path exists and attach
        if (!empty($this->mailData['resume_path']) && file_exists(public_path($this->mailData['resume_path']))) {
            $resumeMimeType = mime_content_type(public_path($this->mailData['resume_path']));
            $attachments[] = Attachment::fromPath(public_path($this->mailData['resume_path']))
                                        ->as('Resume.' . pathinfo($this->mailData['resume_path'], PATHINFO_EXTENSION))
                                        ->withMime($resumeMimeType);
        }

        // Check if the portfolio path exists and attach
        if (!empty($this->mailData['portfolio_path']) && file_exists(public_path($this->mailData['portfolio_path']))) {
            $portfolioMimeType = mime_content_type(public_path($this->mailData['portfolio_path']));
            $attachments[] = Attachment::fromPath(public_path($this->mailData['portfolio_path']))
                                        ->as('Portfolio.' . pathinfo($this->mailData['portfolio_path'], PATHINFO_EXTENSION))
                                        ->withMime($portfolioMimeType);
        }

        return $attachments;
    }

}
