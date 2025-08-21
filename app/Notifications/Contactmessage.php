<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Contactmessage extends Notification
{
    use Queueable;
    private $Contactmessage;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Contactmessage)
    {
        $this->Contactmessage = $Contactmessage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from('jazztider@webbsallad.se', 'Jazztider')
                    ->subject('Jazztiders kontaktformulär')
                    ->greeting('Hallå Anders!')
                    ->line('Jazztider har kontaktats av ' . $this->Contactmessage['name'])
                    ->line('med mailadress ' . $this->Contactmessage['email'])
                    ->line('Budskapet är:')
                    ->line($this->Contactmessage['body']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
