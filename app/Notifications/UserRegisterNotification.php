<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class UserRegisterNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @param object $notifiable
     * @return string[]
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * @param object $notifiable
     * @return MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        $link = URL::signedRoute('api.users.auth.verify', ['user' => $notifiable->id]);

        return (new MailMessage)
            ->line('Activate your account by clicking on the link below')
            ->action('verify Account', $link)
            ->line('TODO APP');
    }

}
