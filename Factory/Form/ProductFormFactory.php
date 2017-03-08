<?php
/**
 * Created by PhpStorm.
 * User: peteratkins
 * Date: 04/12/2016
 * Time: 21:28
 */

namespace Oni\ProductManagerBundle\Factory\Form;


use Oni\CoreBundle\Factory\CoreAbstractFactory;
use Oni\CoreBundle\Form\Type\EntityHiddenType;
use Oni\ProductManagerBundle\Entity\ProductType;
use Oni\ProductManagerBundle\Form\ProductForm;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductFormFactory extends CoreAbstractFactory
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
        $em = $this->serviceContainer->get('doctrine.orm.default_entity_manager');
        $productType = $em->getRepository(ProductType::class)->find($productType);

        $this->formBuilderArray[] = [
            'name' => 'productType',
            'type' => EntityHiddenType::class,
            'properties' => [
                'data' => $productType,
                'class' => ProductType::class,
            ]
        ];

        $productForm->setBuilderArray($this->formBuilderArray);
    }

}