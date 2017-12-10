<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace App\Oni\ProductManagerBundle\Factory\Service;


use App\Oni\CoreBundle\Exceptions\RuntimeException;
use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Service\ProductService;
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