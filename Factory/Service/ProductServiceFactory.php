<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Factory\Service;


use Oni\CoreBundle\Exceptions\RuntimeException;
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
        $productTypeService = $container->get('oni_product_type_service');
        $productOptionService = $container->get('oni_product_option_service');
        $class = '\\Oni\\ProductManagerBundle\\Entity\\Product';

        if (!class_exists($class)) {
            throw new RuntimeException($class . 'Entity does not exist');
        }

        $productService = new ProductService(
            $objectManager,
            $class,
            $productTypeService,
            $productOptionService
        );

        return $productService;

    }

}