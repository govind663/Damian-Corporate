<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;
use Dompdf\Options;

class OrderInvoiceMail extends Mailable
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
            subject: 'Order Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.emails.order_invoice_mail',
            with: [
                'mailData' => $this->mailData,
            ]
        );
    }

    /**
         * Generate PDF and store it in storage.
         */
        /**
     * Generate PDF and store it in the public folder by user name.
     */
    // public function generateAndStorePdf()
    // {
    //     // Load the HTML content
    //     $pdfContent = view('frontend.emails.order_invoice_mail', [
    //         'mailData' => $this->mailData,
    //     ])->render();

    //     // Initialize Dompdf
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($pdfContent);

    //     // Set Paper size (A4)
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render PDF (first pass)
    //     $dompdf->render();

    //     // Output the generated PDF to a file
    //     $output = $dompdf->output();

    //     // Get the user name from the mailData (e.g., $this->mailData['user']->name)
    //     $userName = str_replace(' ', '_', strtolower($this->mailData['user']->name));

    //     // Define the directory path within the public folder
    //     $directoryPath = public_path('invoices/' . $userName);

    //     // Ensure the directory exists, if not create it
    //     if (!file_exists($directoryPath)) {
    //         mkdir($directoryPath, 0755, true);
    //     }

    //     // Generate a unique filename for the PDF
    //     $pdfPath = $directoryPath . '/order_invoice_' . $this->mailData['order']->transaction_token . '.pdf';

    //     // Save PDF to the public folder
    //     file_put_contents($pdfPath, $output);

    //     return $pdfPath;
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     // Generate and store PDF, then attach it
    //     $pdfPath = $this->generateAndStorePdf();

    //     return [
    //         \Illuminate\Mail\Mailables\Attachment::fromPath($pdfPath)
    //             ->as('order_invoice_' . $this->mailData['order']->transaction_token . '.pdf') // Set the filename
    //             ->withMime('application/pdf'), // Set MIME type
    //     ];
    // }

}
