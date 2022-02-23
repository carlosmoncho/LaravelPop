<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjet = 'info contact';
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Product $producto)
    {
        $this->data = $producto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.denunciaA')->with(['data'=>$this->data]);
    }
}
