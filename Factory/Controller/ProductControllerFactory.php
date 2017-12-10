<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 07/11/2016
 * Time: 23:26
 */

namespace App\Oni\ProductManagerBundle\Factory\Controller;


use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Controller\ProductController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductControllerFactory extends CoreAbstractFactory
{

    function getService(ContainerInterface $serviceContainer)
    {
        $productController = new ProductController(
            $serviceContainer->get('oni_product_service'),
            $serviceContainer->get('oni_product_type_service'),
            $serviceContainer->get('oni_product_data_table'),
            $serviceContainer->get('oni_product_option_service')
        );

        $this->injectCommonDependencies($productController, $serviceContainer);

        return $productController;

    }

}