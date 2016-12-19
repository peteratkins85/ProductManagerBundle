<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 04/12/2016
 * Time: 21:28
 */

namespace Oni\ProductManagerBundle\Factory\Form;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Form\ProductCategoryForm;
use Oni\ProductManagerBundle\Form\ProductCategoryType;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductCategoryFormFactory extends CoreAbstractFactory
{

    function getService(ContainerInterface $serviceContainer)
    {
        $productCategoryService = $serviceContainer->get('oni_product_category_service');
        $locale = $serviceContainer->get('oni_get_locale');

        return new ProductCategoryForm(
            $productCategoryService,
            $locale
        );
    }
}