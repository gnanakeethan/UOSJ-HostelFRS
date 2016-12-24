<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Ideamart\IdeamartChannel;
use NotificationChannels\Ideamart\IdeamartMessage;

class RequestAccepted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {

        return [IdeamartChannel::class];
    }

    public function toIdeamart($notifiable)
    {
        return (new IdeamartMessage)
            ->content("Request Accepted");
    }

}