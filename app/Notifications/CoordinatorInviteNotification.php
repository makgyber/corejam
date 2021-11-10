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
                    ->line('You have been invited as a Coordinator.')
                    ->line('Please click the Accept Invitation. ')
                    ->line('Then, type in your new Password and then, please follow these steps:')
                    ->line('1. You be directed to EDIT PROFILE. Fill out the form with correct current information and submit it.')
                    ->line('2. After which, you can login using your registered email and password to www.m610.ph to view your Dashboard.')
                    ->line('3. On your Dashboard, click Church/Affiliations.')
                    ->line('4. Click Add affiliation  and type in your church or organization information in the blank fields;')
                    ->line('5. Then, click Save and Return')
                    ->line('6. On the Affiliation Table, click the "Members" button;')
                    ->line('7. You will be redirected to the Member Registry and then, START registering your church members 
                    who are registered voters who have decided and committed to vote 
                    for Sen.Manny Pacquiao for President in their hearts.')
                    ->line('If you have questions, feel free to message us at info.m610@gmail.com. Thank you very much!')
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
