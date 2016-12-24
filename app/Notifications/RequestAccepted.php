<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Facebook\Attachment\Button;
use NotificationChannels\Facebook\FacebookChannel;
use NotificationChannels\Facebook\FacebookMessage;
use NotificationChannels\Facebook\NotificationType;
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
        $channels = [];
        $channels[] = isset($notifiable->facebook_id) ? FacebookChannel::class : NULL;
        $channels[] = isset($notifiable->ideamart_id) ? IdeamartChannel::class : NULL;
//        $channels[] = isset($notifiable->email) ? 'mail' : NULL;

        return array_unique($channels);
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())->to($notifiable->email)->line("Line");
    }

    public function toIdeamart($notifiable)
    {
        return (new IdeamartMessage)
            ->content("Request Accepted" . Carbon::now()->toDateTimeString());
    }

    public function toFacebook($notifiable)
    {

        return FacebookMessage::create()
            ->to('1183510155031384')// Optional
            ->text('Success in Notification');
    }

}