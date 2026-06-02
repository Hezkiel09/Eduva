<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $code;
    public string $username;

    public function __construct(string $code, string $username)
    {
        $this->code     = $code;
        $this->username = $username;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kode Verifikasi Akun Eduva Kamu',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.verification_code',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
