<?php

namespace App\Mail\Todo;

use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Send when new user is added into list of users, that shares specific todo.
 */
class NewShare extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(private readonly Todo $todo)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New shared todo',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.todo.share',
            with: [
                'username' => $this->todo->author->email,
                'todoName' => $this->todo->name,
                'todoId' => $this->todo->id,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
