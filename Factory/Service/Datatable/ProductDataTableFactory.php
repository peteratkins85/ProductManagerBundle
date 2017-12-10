<?php

namespace App\Oni\ProductManagerBundle\Factory\Service\Datatable;

use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Entity\Product;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductCategoryDataTable;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductDataTable;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductDataTableFactory extends CoreAbstractFactory
{
    public function getService(ContainerInterface $serviceContainer)
    {
        $em = $serviceContainer->get('doctrine.orm.default_entity_manager');
        $repository = $em->getRepository(Product::class);
        $request = $serviceContainer->get('request_stack');
        $query = $request->getCurrentRequest()->query->all();
        $query['locale'] = $request->getCurrentRequest()->getLocale();

        return new ProductDataTable($repository, $query);
    }
}