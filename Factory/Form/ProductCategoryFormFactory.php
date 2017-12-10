<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 04/12/2016
 * Time: 21:28
 */

namespace App\Oni\ProductManagerBundle\Factory\Form;


use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\ProductManagerBundle\Entity\ProductCategory;
use App\Oni\ProductManagerBundle\Form\ProductCategoryType;
use App\Oni\ProductManagerBundle\Form\ProductCategoryType;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductCategoryFormFactory extends CoreAbstractFactory
{

    function getService(ContainerInterface $serviceContainer)
    {
        $productCategoryService = $serviceContainer->get('oni_product_category_service');
        $locale = $serviceContainer->get('oni_get_locale');

        return new ProductCategoryType(
            $productCategoryService,
            $locale
        );
    }
}