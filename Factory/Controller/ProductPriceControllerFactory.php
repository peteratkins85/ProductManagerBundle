<?php
namespace App\Oni\ProductManagerBundle\Factory\Controller;


use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Controller\ProductPriceController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductPriceControllerFactory extends CoreAbstractFactory
{
    function getService(ContainerInterface $serviceContainer)
    {
        $controller = new ProductPriceController();

        $this->injectCommonDependencies($controller, $serviceContainer);

        return $controller;
    }
}