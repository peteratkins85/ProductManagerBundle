<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace App\Oni\ProductManagerBundle\Factory\Service;


use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Entity\ProductOption;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroupType;
use App\Oni\ProductManagerBundle\Service\ProductOptionService;
use App\Oni\ProductManagerBundle\Service\ProductTypeService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ProductTypeServiceFactory
 * @package Oni\ProductManagerBundle\Factory\Service
 * @author peter.atkins85@gmail.com
 */
class ProductOptionServiceFactory extends CoreAbstractFactory
{

    /**
     * @param ContainerInterface $container
     * @return ProductTypeService
     */
    public function getService(ContainerInterface $container)
    {

        $objectManager  = $container->get('doctrine.orm.entity_manager');
        $coreService = $container->get('oni_core_service');
        $productOptionGroupRepository = $objectManager->getRepository(ProductOptionGroup::class);
        $productOptionRepository = $objectManager->getRepository(ProductOption::class);
        $productOptionGroupTypeRepository = $objectManager->getRepository(ProductOptionGroupType::class);

        $service = new ProductOptionService(
            $productOptionRepository,
            $productOptionGroupRepository,
            $productOptionGroupTypeRepository,
            $coreService
        );

        return $service;

    }

}