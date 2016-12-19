<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 08/11/2016
 * Time: 22:54
 */

namespace Oni\ProductManagerBundle\Factory\Service;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Entity\ProductOption;
use Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use Oni\ProductManagerBundle\Entity\ProductOptionGroupType;
use Oni\ProductManagerBundle\Service\ProductOptionService;
use Oni\ProductManagerBundle\Service\ProductTypeService;
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
        $productOptionGroupRepository = $objectManager->getRepository(ProductOptionGroup::class);
        $productOptionRepository = $objectManager->getRepository(ProductOption::class);
        $productOptionGroupTypeRepository = $objectManager->getRepository(ProductOptionGroupType::class);

        $service = new ProductOptionService(
            $productOptionRepository,
            $productOptionGroupRepository,
            $productOptionGroupTypeRepository
        );

        return $service;

    }

}