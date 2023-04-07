<?php
namespace App\Tests\Entity;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase{
    public function testUserEntity() {
        $user = new User;

        $user->setLastname('alba'); 
        $user->setFirstname('alba18'); 
        $user->setEmail('alba/@example.com');
        $user->setPassword('0000');
        $user->setRoles(['ROLE_ADMIN']);

        $this->assertEquals('alba', $user->getLastname());
        $this->assertEquals('alba18', $user->getFirstname()); 
        $this->assertEquals('alba/@example.com', $user->getEmail());
        $this->assertEquals('0000', $user->getPassword()); 
        $this->assertContains('ROLE_ADMIN', $user->getRoles()); 
    }

  
}
?>
