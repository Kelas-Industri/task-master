<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewTaskEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $mailTask;

    /**
     * Create a new message instance.
     */
    public function __construct($task)
    {
        $this->mailTask = $task;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Task Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->markdown('emails.new_task',[
            'task' => $this->mailTask
        ]);
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
