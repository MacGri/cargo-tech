<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CargoCreateNotify extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            //
        ];
    }
}
