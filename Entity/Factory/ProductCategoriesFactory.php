<?php

namespace Cms\ProductManagerBundle\Entity\Factory;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Session\Session;
use appDevDebugProjectContainer;

class ProductCategoriesFactory
{

    public static function getRepository(Session $session, appDevDebugProjectContainer $container){

        $repository = $container->get('product_categories_repository');
        $productCategoriesEntity = $container->get('product_categories');
        $repository->languageId = 1;
        $repository->setEntityClass($productCategoriesEntity);

        return $repository;

    }

}