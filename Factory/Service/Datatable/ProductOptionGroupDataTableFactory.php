<?php

namespace App\Oni\ProductManagerBundle\Factory\Service\Datatable;

use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductCategoryDataTable;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
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