<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    // === 追加
    public $email;
    public $name;
    public $relationship;
    public $content;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {   
        // === 追加
        foreach($data as $key=>$value) {
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
        // === 追加
        return $this->subject($this->name . 'パスワード変更');
            
    }
}
