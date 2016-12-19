<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 04/12/2016
 * Time: 21:28
 */

namespace Oni\ProductManagerBundle\Factory\Form;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\ProductManagerBundle\Form\ProductForm;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductFormFactory extends CoreAbstractFactory
{

    protected $formBuilderArray;

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
     * @return ProductForm
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

        $productForm = new ProductForm(
            $productService,
            $productCategoryService,
            $locale
        );

        switch ($route){
            case 'oni_add_product_wizard':

                $this->buildFormForWizardRoute($productForm);

                break;
            default:
                $formBuilderArray = $this->defaultBuilderArray;
        }

        return $productForm;
    }

    /**
     * @param ProductForm $productForm
     */
    protected function buildFormForWizardRoute(ProductForm $productForm)
    {
        $productType = $this->request->attributes->get('productType');

        $this->formBuilderArray[] = [
            'name' => 'productType',
            'type' => HiddenType::class,
            'properties' => [
                'data' => $productType
            ]
        ];

        $productForm->setBuilderArray($this->formBuilderArray);
    }

}