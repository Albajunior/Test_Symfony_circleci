<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    // private $userPasswordHasherInterface;
    // public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface) 
    // {
    //     $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    // }
 

    public function load(ObjectManager $manager): void
    {
        
        for ($i=0; $i <11 ; $i++) { 
            $user = new User();

            $user->setLastname('Alba'.$i);
            $user->setFirstname('junior');
            $user->setEmail('alba'.$i.'@gmail.com');
            $user->setPassword(password_hash('passer', PASSWORD_DEFAULT));
            $manager->persist($user);
    
            $manager->flush();
        }
      
    }
}
