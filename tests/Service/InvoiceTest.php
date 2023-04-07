<?php
namespace App\Tests\Service;

use App\Service\EmailService;
use App\Service\Invoice;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InvoiceTest extends KernelTestCase{

    public function testProcessInvoice() {

        
        $myService = $this->createMock(EmailService::class);

        $myService->expects($this->once())->method('send')
        ->willReturn(true);

        $invoice = new Invoice($myService);
        $sent = $invoice->process("gagag@mail.com", 500);
        $this->assertTrue($sent);

    }
}