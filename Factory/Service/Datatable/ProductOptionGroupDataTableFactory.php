<?php

namespace Oni\ProductManagerBundle\Factory\Service\Datatable;

use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use Oni\ProductManagerBundle\Service\DataTable\ProductCategoryDataTable;
use Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductOptionGroupDataTableFactory extends CoreAbstractFactory
{
    public function getService(ContainerInterface $serviceContainer)
    {
        $em = $serviceContainer->get('doctrine.orm.default_entity_manager');
        $repository = $em->getRepository(ProductOptionGroup::class);
        $request = $serviceContainer->get('request_stack');
        $query = $request->getCurrentRequest()->query->all();
        $query['locale'] = $request->getCurrentRequest()->getLocale();

        return new ProductOptionGroupDataTable($repository, $query);
    }
}