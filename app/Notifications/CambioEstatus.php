<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CambioEstatus extends Notification
{
    use Queueable;

    protected $folio;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($folio)
    {
        //
        $this->folio = Ticket::where('folio',$folio)->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
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
            'folio' => $this->folio->folio,
            'message' => "El estatus de soporte con el folio {$this->folio->folio} ha cambiado a {$this->folio->estatus->nombre}.",
            'timestamp' => now()->toDateTimeString(),
        ];
    }
}
