<?php

namespace Cms\ProductManagerBundle\Entity\Factory;

use Doctrine\Bundle\DoctrineBundle\Registry;
use appDevDebugProjectContainer;

class ProductCategoriesFactory
{

    public static function getProductCategoriesRepository($session, appDevDebugProjectContainer $container){

        $repository = $container->get('product_categories_repository');
        $container->getParameter('content_manager_entity_languages');
        $repository->language = 1;

        return $repository;

    }

}