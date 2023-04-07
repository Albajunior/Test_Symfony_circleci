<?php 
namespace App\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;

//pour les tests fonctionnels extend WebTestCase
class UserTest extends WebTestCase{

   

    public function testConnexionSuccess()
    {

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        //on va d'abord tester si on est sur la bonne page 
        $this->assertSelectorTextContains('button.btn.btn-lg.btn-primary','Sign in');

        $form = $crawler->selectButton('Sign in')->form();
        $form['email'] = 'alba0@gmail.com';
        $form['password'] = 'passer';
        $client->submit($form);

        $crawler = $client->followRedirect();

        //$crawler = $client->request('GET', '/');
        $this->assertSelectorTextContains('h1','Hello junior');
        $this->assertSelectorTextContains('a','Deconnexion');
        
    }

    public function testConnexionFail()
    {

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Sign in')->form();
        $form['email'] = 'badmail@gmail.com';
        $form['password'] = 'passerrr';
        $client->submit($form);

       $crawler = $client->followRedirect();

       $this->assertSelectorTextContains('div.alert.alert-danger','Invalid credentials.');
        
    }

    public function testInscriptionSucess() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');

        $form = $crawler->selectButton('Register')->form();
        $form['registration_form[email]'] = 'adsds@example.com';
        $form['registration_form[lastname]'] = 'user1';
        $form['registration_form[firstname]'] = 'john';
        $form['registration_form[plainPassword]'] = 'password1';
        $client->submit($form); 

        $userRepository = static::getContainer()->get(UserRepository::class);
        $findUser = $userRepository->findOneByEmail('adsds@example.com');
        $this->assertEquals("john", $findUser->getFirstName());
           
        $this->assertResponseRedirects('/login');

        $crawler = $client->followRedirect();
        $this->assertSelectorTextContains('h1','Please sign in');
    }
}