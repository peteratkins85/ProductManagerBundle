<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 07/11/2016
 * Time: 23:26
 */

namespace Oni\ProductManagerBundle\Factory\Controller;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Controller\ProductCategoryController;
use Oni\ProductManagerBundle\Controller\ProductController;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ProductCategoryControllerFactory
 * @package Oni\ProductManagerBundle\Factory\Controller
 * @author peter.atkins85@gmail.com
 */
class ProductCategoryControllerFactory extends CoreAbstractFactory
{

    /**
     * @param ContainerInterface $serviceContainer
     * @return ProductCategoryController
     */
    function getService(ContainerInterface $serviceContainer)
    {
        $productCategoryController = new ProductCategoryController(
            $serviceContainer->get('oni_product_category_service'),
            $serviceContainer->get('oni_product_category_data_table')
        );

        $this->injectCommonDependencies($productCategoryController, $serviceContainer);

        return $productCategoryController;

    }

}