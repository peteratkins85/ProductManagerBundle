<?php

namespace Oni\ProductManagerBundle\Events;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Oni\ProductManagerBundle\Entity\Products;

class ProductEvent extends Event
{
    private $request;
    private $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    /**
     * @return Products
     */
    public function getProduct()
    {
        return $this->product;
    }


}
