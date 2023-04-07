<?php

namespace App\Service;
use App\Service\EmailService;

class Invoice {

    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function process($email,  $montant)
    {
        $message = 'Votre commande d’un montant de '.$montant. ' est confirmée';

        $sent = $this->emailService->send($email, $message);

        return $sent;

    }
}