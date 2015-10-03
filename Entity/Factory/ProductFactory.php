<?php

namespace Cms\ProductManagerBundle\Entity\Factory;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Cms\ProductManagerBundle\Entity\Repository\ProductsRepository;

class ProductFactory
{

    public static function getProductRepository($session,$container){

        $productRepository = $container->get('products_repository');
        $productRepository->languageId = 1;

        return $productRepository;

    }

}