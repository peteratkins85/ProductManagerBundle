<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace App\Oni\ProductManagerBundle\Factory\Service;


use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Form\ProductType;
use App\Oni\ProductManagerBundle\Service\ProductService;
use App\Oni\ProductManagerBundle\Service\ProductTypeService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ProductTypeServiceFactory
 * @package Oni\ProductManagerBundle\Factory\Service
 * @author peter.atkins85@gmail.com
 */
class ProductTypeServiceFactory extends CoreAbstractFactory
{

    /**
     * @param ContainerInterface $container
     * @return ProductTypeService
     */
    public function getService(ContainerInterface $container)
    {

        $objectManager  = $container->get('doctrine.orm.entity_manager');
        $class = '\\Oni\\ProductManagerBundle\\Entity\\ProductType';

        if (!class_exists($class)) {
            throw new RuntimeException($class . 'entity does not exist');
        }

        $service = new ProductTypeService(
            $objectManager,
            $class
        );

        return $service;

    }

}