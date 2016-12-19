<?php

namespace Oni\ProductManagerBundle\Form;

use Entity\Category;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Service\ProductCategoryService;
use Oni\ProductManagerBundle\Service\ProductService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductForm extends AbstractType
{

    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * @var ProductCategoryService
     */
    protected $productCategoryService;

    /**
     * @var array
     */
    protected $builderArray;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var
     */
    protected $form;

    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService, string $locale)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->locale = $locale;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (isset($options['data']) &&  $options['data'] instanceof Product && !empty($options['data']->getId)){



        }

        $this->addBuilderArray($builder);

        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr' => [
                    'data-parsley-required' => 'true',
                    'data-parsley-max'      => '50'
                ]
            ])
            ->add('sku', TextType::class, [
                'label' => 'Sku',
            ])
            ->add('upc', TextType::class, [
                'label' => 'Upc',
                'required' => false
            ])
            ->add('visibility', CheckboxType::class, [
                'label' => 'Viewable',
                'attr'  => [
                    'plugin' => 'switch'
                ]
            ])
            ->add('shortDescription', TextType::class,[
                'label' => 'Short Description'
            ])
            ->add('description', TextareaType::class,[
                'label'    => 'Description',
                'required' => false,
                'attr'     => [
                    'class' => 'ckeditor'
                ]
            ])
//            ->add('prices', TextType::class, [
//                'required' => false
//            ])
//            ->add('categories', ChoiceType::class, [
//                    'choices'      => $this->productCategoryService->getProductCategoryRepository()->findAll(),
//                    'attr'         => [
//                        'class'    => 'select2 input-xlarge',
//                        'multiple' => 'multiple'
//                    ],
//                    'choice_label' => function (ProductCategory $category, $key, $index) {
//                        return !empty($category->getName()) ? $category->getName() : $category->getUrl();
//                    },
//                    'group_by' => function($category, $key, $index) {
//                        /** @var $category  ProductCategory */
//                        return ($category->getParent()) ? ($category->getParent()->getName() == 'rootCategory') ? null : $category->getParent()->getName() : null;
//                    },
//                    'by_reference' => false,
//                    'required' => false
//                ]
//            )
            ->add('submit', SubmitType::class,[
                'label' => 'Save'
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Oni\ProductManagerBundle\Entity\Product',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'attr' => [
                'data-parsley-validate' => ''
            ]
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'oni_product_form';
    }

    /**
     * @param array $builderArray
     */
    public function setBuilderArray(array $builderArray)
    {
        $this->builderArray = $builderArray;
    }

    public function addBuilderArray(FormBuilderInterface $builder)
    {

        foreach ($this->builderArray as $key => $builderArray){

            if (!empty($builderArray['name'])
                && !empty($builderArray['type'])
                && $builderArray['type'] instanceof FormTypeInterface
                && !empty($builderArray['properties']) && is_array($builderArray['properties'])
            ) {

                $builder->add(
                    $builderArray['name'],
                    $builderArray['type'],
                    $builderArray['properties']
                );

            }

        }

    }

}
