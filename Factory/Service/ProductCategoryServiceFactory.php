<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Factory\Service;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Service\ProductCategoryService;
use Oni\ProductManagerBundle\Service\ProductService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ProductCategoryServiceFactory
 * @package Oni\ProductManagerBundle\Factory\Service
 * @author peter.atkins85@gmail.com
 */
class ProductCategoryServiceFactory extends CoreAbstractFactory
{

    /**
     * @param ContainerInterface $container
     * @return ProductService
     */
    public function getService(ContainerInterface $container)
    {
        $objectManager  = $container->get('doctrine.orm.entity_manager');
        $class = ProductCategory::class;
        $locale = $container->get('oni_get_locale');

        if (!class_exists('\\'.$class))
            Throw InvalidEntityClassException($class. 'Entity does not exist');

        $productService = new ProductCategoryService(
            $objectManager,
            $class,
            $locale
        );

        return $productService;
    }

}