<?php

namespace Cms\ProductManagerBundle\Entity\Factory;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\DependencyInjection\ContainerInterface;
use appDevDebugProjectContainer;

class ProductCategoryDefinitionsFactory
{

    public static function getRepository(Session $session, ContainerInterface $container){

        $repository = $container->get('product_categories_definitions_repository');
        $entity = $container->get('product_category_definitions');
        $repository->languageId = 1;
        $repository->setEntityClass($entity);

        return $repository;

    }

}