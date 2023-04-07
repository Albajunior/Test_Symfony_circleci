<?php

namespace App\Service;

class EmailService
{
    public function send($toEmail, $message){
        return (bool) mt_rand(0,1);
    }
}