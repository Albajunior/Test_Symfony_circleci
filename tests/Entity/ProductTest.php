<?php
namespace App\Tests\Entity;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductTest extends KernelTestCase{
    public function testProductEntity() {
        $product = new Product;

        $product->setName('produit1'); 
       $product->setPrice(15666);

        $this->assertEquals('produit1',$product->getName());
        $this->assertEquals(15666, $product->getPrice()); 
    }
}
?>
