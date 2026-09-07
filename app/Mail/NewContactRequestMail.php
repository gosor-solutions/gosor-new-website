<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public ContactMessage $contactMessage,
        public string $source = 'Landing Form'
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $projectType = $this->contactMessage->project_type ?: 'General Inquiry / استفسار عام';
        $senderName = $this->contactMessage->name ?: 'New Client';

        return new Envelope(
            subject: "طلب جديد ({$projectType}) من: {$senderName}",
            replyTo: $this->contactMessage->email
                ? [new Address($this->contactMessage->email, $this->contactMessage->name ?? '')]
                : [],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-request',
            with: [
                'contact' => $this->contactMessage,
                'source' => $this->source,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
