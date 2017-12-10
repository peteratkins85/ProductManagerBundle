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
use App\Oni\ProductManagerBundle\Controller\ProductOptionController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductOptionControllerFactory extends CoreAbstractFactory
{

    function getService(ContainerInterface $serviceContainer)
    {
        $controller = new ProductOptionController(
            $serviceContainer->get('oni_product_option_service'),
            $serviceContainer->get('oni_product_option_group_data_table')
        );

        $this->injectCommonDependencies($controller, $serviceContainer);

        return $controller;

    }

}