<?php

namespace App\EventListener;

use App\Entity\Product;

class ProductListener
{
    public function prePersist(Product $product): void
    {
        $product->setCreated(new \DateTime('now'));
        $product->setUpdated(new \DateTime('now'));
    }

    public function preUpdate(Product $product): void
    {
        $product->setUpdated(new \DateTime('now'));
    }
}