<?php

namespace Oni\ProductManagerBundle\Factory\Service\Datatable;

use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Service\DataTable\ProductCategoryDataTable;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductCategoryDataTableFactory extends CoreAbstractFactory
{
    public function getService(ContainerInterface $serviceContainer)
    {
        $em = $serviceContainer->get('doctrine.orm.default_entity_manager');
        $repository = $em->getRepository(ProductCategory::class);
        $request = $serviceContainer->get('request_stack');
        $query = $request->getCurrentRequest()->query->all();
        $query['locale'] = $request->getCurrentRequest()->getLocale();

        return new ProductCategoryDataTable($repository, $query);
    }
}