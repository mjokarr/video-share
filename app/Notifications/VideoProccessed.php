<?php

namespace App\Notifications;

use App\Mail\VerifyEmail;
use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class VideoProccessed  extends Notification implements ShouldQueue
{
    use Queueable;
    private $video;
    // public $queue = 'highest';
    /**
     * Create a new notification instance.
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
        // $this->onQueue('highest');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', /** 'database' */];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
        // Mail::to('Admin@gmail.com')->send(new VerifyEmail);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    # Storage in Database:
    public function toArray(object $notifiable): array
    {
        return [
            # Test:
            // 'video_name' => $this->video->name,
            // 'url' => $this->video->url,
        ];
    }
}
