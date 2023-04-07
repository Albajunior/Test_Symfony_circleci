<?php

namespace App\Service;

use App\Entity\Product;

class ServiceCalculator
{
    public function getTotalHT($items)
    {
        $totalHT = 0;

        foreach ($items as $item) {
            $product = $item['product'];
            $quantite = $item['quantite'];

            $totalHT += $product->getPrice() * $quantite;
         
        }
       // dump($items); die;
        return $totalHT;
    }

    public function getTotalTTC($items, $tax)
    {
        $totalHT = $this->getTotalHT($items);

        $totalTTC = $totalHT * (1 + $tax / 100);

        return $totalTTC;
    }
}