<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Factory\Service;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Service\ProductService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ProductServiceFactory
 * @package Oni\ProductManagerBundle\Factory\Service
 * @author peter.atkins85@gmail.com
 */
class ProductServiceFactory extends CoreAbstractFactory
{

    /**
     * @param ContainerInterface $container
     * @return ProductService
     */
    public function getService(ContainerInterface $container)
    {

        $objectManager  = $container->get('doctrine.orm.entity_manager');
        $class = 'Oni\\ProductManagerBundle\\Entity\\Product';

        if (!class_exists('\\'.$class))
            Throw InvalidEntityClassException($class. 'Entity does not exist');

        $productService = new ProductService(
            $objectManager,
            $class
        );

        return $productService;

    }

}