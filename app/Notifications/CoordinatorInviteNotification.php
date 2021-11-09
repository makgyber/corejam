<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CoordinatorInviteNotification extends Notification
{
    use Queueable;
    private $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
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
                    ->greeting("Dear Co-Worker in God’s Kingdom, ")
                    ->line('You have been invited as a Coordinator. Please click the Accept Invitation.')
                    ->line('Fill out the form with correct current information and submit it.')
                    ->line('After which, you can login using your registered email and password to www.m610.ph to view your Dashboard.')
                    ->action('Accept invitation', $this->url)
                    ->salutation("Blessings, ")
                    ->from('info.m610@m610.com', 'Admin M6:10');
                    
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
