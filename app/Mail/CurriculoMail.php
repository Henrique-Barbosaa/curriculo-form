<?php

namespace App\Mail;

use App\Models\Curriculo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CurriculoMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $curriculo;
    public $message;

    public function __construct(Curriculo $curriculo, string $message)
    {
        $this->curriculo = $curriculo;
        $this->message = $message;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->message . $this->curriculo->nome,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email-body',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path('app/public/' . $this->curriculo->caminho_arquivo))
        ];
    }
}
