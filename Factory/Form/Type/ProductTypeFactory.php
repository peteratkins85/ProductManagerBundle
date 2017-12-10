<?php

namespace App\Oni\ProductManagerBundle\Factory\Form\Type;


use App\Oni\CoreBundle\Factory\CoreAbstractFactory;
use App\Oni\CoreBundle\Form\Type\EntityHiddenType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Oni\ProductManagerBundle\Form\ProductType;
use App\Oni\ProductManagerBundle\Entity\ProductType as ProductTypeEntity;


class ProductTypeFactory extends CoreAbstractFactory
{

    public $formBuilderArray;

    /**
     * @var
     */
    protected $request;

    /**
     * @var ContainerInterface
     */
    protected $serviceContainer;

    /**
     * @param ContainerInterface $serviceContainer
     * @return \App\Oni\ProductManagerBundle\Form\ProductType
     */
    function getService(ContainerInterface $serviceContainer)
    {
        $productCategoryService = $serviceContainer->get('oni_product_category_service');
        $productService = $serviceContainer->get('oni_product_service');
        $locale = $serviceContainer->get('oni_get_locale');
        $request = $serviceContainer->get('request_stack');
        $this->serviceContainer = $serviceContainer;
        $this->request = $request->getCurrentRequest();
        $route = $this->request->attributes->get('_route');

        $productForm = new \App\Oni\ProductManagerBundle\Form\ProductType(
            $productService,
            $productCategoryService,
            $locale
        );

        switch ($route){
            case 'oni_add_product_wizard':
                $this->buildFormForProductCreationWizard($productForm);

                break;
            default:
                break;
        }

        return $productForm;
    }

    /**
     * @param \App\Oni\ProductManagerBundle\Form\ProductType $productForm
     */
    protected function buildFormForProductCreationWizard(ProductType $productForm)
    {
        $productType = $this->request->attributes->get('productType');
        $em = $this->serviceContainer->get('doctrine.orm.default_entity_manager');
        $productType = $em->getRepository(ProductTypeEntity::class)->find($productType);

        if ($productType) {
            $productForm->setProductType($productType);
            $this->formBuilderArray[] = [
                'name' => 'productType',
                'type' => EntityHiddenType::class,
                'properties' => [
                    'data' => $productType,
                    'class' => ProductTypeEntity::class,
                ]
            ];

            $productForm->setBuilderArray($this->formBuilderArray);

        } else {
            throw new \Exception('Invalid product type id '. $productType);
        }
    }

}