<?php

namespace App\Mail\Ticket;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Estatus extends Mailable
{
    use Queueable, SerializesModels;
    public $datos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($folio)
    {
        $this->datos = Ticket::where('folio',$folio)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('correos.general.estatus')
        ->subject('Cambio de Estatus de Soporte');
    }
}
