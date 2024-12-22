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
        // // Check if the file exists
        // if (File::exists($this->resumePath)) {
        //     // Get the original file extension
        //     $extension = File::extension($this->resumePath);

        //     // Determine the MIME type based on the file extension
        //     $mimeType = match ($extension) {
        //         'pdf' => 'application/pdf',
        //         'doc', 'docx' => 'application/msword',
        //         'jpg', 'jpeg' => 'image/jpeg',
        //         'png' => 'image/png',
        //         'gif' => 'image/gif',
        //         'txt' => 'text/plain',
        //         default => 'application/octet-stream',
        //     };

        //     // Return the attachment
        //     return [
        //         Attachment::fromPath($this->resumePath)

        //             ->as('Resume.' . $extension)
        //             ->withMime($mimeType)
        //             ->withCustomHeaders([
        //                 'Content-Disposition' => 'attachment; filename="Resume.' . $extension . '"',
        //             ]),
        //     ];
        // }

        // if (File::exists($this->portfolioPath)) {
        //     // Get the original file extension
        //     $extension = File::extension($this->portfolioPath);

        //     // Determine the MIME type based on the file extension
        //     $mimeType = match ($extension) {
        //         'pdf' => 'application/pdf',
        //         'doc', 'docx' => 'application/msword',
        //         'jpg', 'jpeg' => 'image/jpeg',
        //         'png' => 'image/png',
        //         'gif' => 'image/gif',
        //         'txt' => 'text/plain',
        //         default => 'application/octet-stream',
        //     };

        //     // Return the attachment
        //     return [
        //         Attachment::fromPath($this->portfolioPath)
        //             ->as('Portfolio.' . $extension)
        //             ->withMime($mimeType)
        //             ->withCustomHeaders([
        //                 'Content-Disposition' => 'attachment; filename="Portfolio.' . $extension . '"',
        //             ]),
        //     ];
        // }

        // Return an empty array if no file exists
        return [];
    }

}
