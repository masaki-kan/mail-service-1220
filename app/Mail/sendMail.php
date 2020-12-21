<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     
     public $name;
     public $email;
     public $relations;
     public $contents;
     
    public function __construct( array $data )
    {
        //
        foreach( $data as $key => $value ){
            $this->{$key} = $value;
        }

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ごあいさつ代行サービス「AISATU」の運営本部です')->text('mailBox');
    }
}
