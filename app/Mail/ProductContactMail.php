<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageContent;
    public $productName;
    public $productDescription;
    public $productImage;
    public $isUserEmail;

    public function __construct($name, $email, $messageContent, $productName, $productDescription, $productImage, $isUserEmail = false)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productImage = $productImage;
        $this->isUserEmail = $isUserEmail;
    }

    public function build()
    {
        if ($this->isUserEmail) {
            return $this->subject('Thank you for contacting us')
                        ->view('emails.user_product_contact_confirmation');
        } else {
            return $this->subject('New Product Contact Form Submission')
                        ->view('emails.product_contact_form');
        }
    }
}
