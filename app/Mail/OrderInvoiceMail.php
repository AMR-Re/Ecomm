<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
public $order;
    
    public function __construct($order)

    {
        $this->order=$order;
        
    }
public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Invoice Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.order_invoice',
            with:[
                'order'=> $this->order,
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
        return [];
    }
}
