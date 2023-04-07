<?php
namespace App\Tests\Entity;

use App\Entity\Order;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OrderTest extends KernelTestCase{
    public function testorderEntity() {

        $order = new Order();

        $order->setNumber(19876); 
        $order->setTotalprice(1500000); 

        $user = new User();
        $user->setEmail('sdfg@example.com');
        $order->setUser($user);
        
    
        $this->assertEquals('19876',$order->getNumber());
        $this->assertEquals('1500000', $order->getTotalprice()); 
        $this->assertEquals('sdfg@example.com',$order->getUser()->getEmail());
    }
}
?>
