<?php

namespace App\Tests\Service;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\ServiceCalculator;

class CalculatorTest extends KernelTestCase{
    
    public function testCalculatorTotalHt() {

        $items = [
            ['product' => $this->createProduct('iphone', 10), 'quantite' => 1],
            ['product' => $this->createProduct('tecno', 20), 'quantite' => 2],
        ];

        $ServiceCalculator = new ServiceCalculator();
        $totalHT = $ServiceCalculator->getTotalHT($items);

        $this->assertEquals(50, $totalHT);
    }


    public function testCalculatorTotalTTC()
    {
        $items = [
            ['product' => $this->createProduct('product 1', 10), 'quantite' => 1],
            ['product' => $this->createProduct('product 2', 20), 'quantite' => 2],
        ];

        $ServiceCalculator = new ServiceCalculator();
        $totalTTC = $ServiceCalculator->getTotalTTC($items, 20);

        $this->assertEquals(60, $totalTTC);
    }

    public function createProduct($name, $price) {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        
        return $product;
    }
}