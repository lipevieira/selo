<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Institution;

class InstitutionRegistered extends Notification implements ShouldQueue
{
    use Queueable;
    private $institution;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Institution $institution)
    {
        $this->institution = $institution;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject("A instituição  {$this->institution->name} se cadastrou no Selo da adiversidade")
                    // ->line('The introduction to the notification.')
                    ->action('Ver informações da Instituição', route('home.details.institution',$this->institution->id))
                    ->line('Obrigado.');
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
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'institution'   =>  $this->institution,
        ];
    }
}
