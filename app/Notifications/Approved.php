<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Approved extends Notification implements ShouldQueue
{
    use Queueable;
    private $name;
    private $approvedBy;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($theName, $approvedBy)
    {
        $this->name = $theName;
        $this->approvedBy = $approvedBy;
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
        $name = $this->name;
        $approvedBy = $this->approvedBy;
        return (new MailMessage)
                    ->greeting("Hello $notifiable->name")
                    ->subject('Requisition approved.')
                    ->line("Your requisition $name has been approved by $approvedBy.")
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
