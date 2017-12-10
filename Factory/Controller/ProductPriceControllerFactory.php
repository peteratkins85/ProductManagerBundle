<?php
namespace Oni\ProductManagerBundle\Factory\Controller;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Controller\ProductPriceController;
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