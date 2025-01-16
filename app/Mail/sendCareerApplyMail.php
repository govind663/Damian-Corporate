<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\File;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendCareerApplyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    public $resumePath;
    public $portfolioPath;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData, $resumePath, $portfolioPath)
    {
        $this->mailData = $mailData;
        $this->resumePath = $resumePath;
        $this->portfolioPath = $portfolioPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Career Enquiry Details',
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
        // Function to determine MIME type based on file extension
        $getMimeType = fn($path) => match (File::extension($path)) {
            'pdf' => 'application/pdf',
            'doc', 'docx' => 'application/msword',
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'txt' => 'text/plain',
            default => 'application/octet-stream',
        };

        // Initialize an empty array for attachments
        $attachments = [];

        // Check if the resume file exists
        if (File::exists($this->resumePath)) {
            $extension = File::extension($this->resumePath);
            $mimeType = $getMimeType($this->resumePath);
            $attachments[] = Attachment::fromPath($this->resumePath)
                ->as('Resume.' . $extension)
                ->withMime($mimeType);
        }

        // Check if the portfolio file exists
        if (File::exists($this->portfolioPath)) {
            $extension = File::extension($this->portfolioPath);
            $mimeType = $getMimeType($this->portfolioPath);
            $attachments[] = Attachment::fromPath($this->portfolioPath)
                ->as('Portfolio.' . $extension)
                ->withMime($mimeType);
        }

        // Return the accumulated attachments
        return $attachments;
    }

}
