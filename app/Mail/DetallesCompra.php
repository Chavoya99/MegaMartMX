<?php

namespace App\Mail;

use App\Models\Compra;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DetallesCompra extends Mailable
{
    use Queueable, SerializesModels;
    public $productos, $subtotal, $envio, $total;
    /**
     * Create a new message instance.
     */
    public function __construct(public Compra $compra)
    {
        $this->productos = $compra->productos;
        $this->subtotal = $compra->subtotal;
        $this->envio = $compra->envio;
        $this->total = $compra->total;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Detalles de tu compra en MegaMartMx',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.correo_detalles_compra',
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
