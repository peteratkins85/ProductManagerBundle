<?php

namespace Oni\ProductManagerBundle\Form;

use Oni\ProductManagerBundle\Constants\ProductTypes;
use Oni\ProductManagerBundle\Entity\Product;
use Oni\ProductManagerBundle\Entity\ProductCategory;
use Oni\ProductManagerBundle\Entity\ProductType as ProductTypeEntity;
use Oni\ProductManagerBundle\Service\ProductCategoryService;
use Oni\ProductManagerBundle\Service\ProductService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
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

    /**
     * @var \Oni\ProductManagerBundle\Entity\ProductType
     */
    protected $productType;

    public function __construct(
        ProductService $productService,
        ProductCategoryService $productCategoryService,
        string $locale
    ) {
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
        if (isset($options['data']) && $options['data'] instanceof Product && !empty($options['data']->getId)) {


        }

        $this->addBuilderArray($builder);

        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr'  => [
                    'data-parsley-required' => 'true',
                ]
            ])
            ->add('sku', TextType::class, [
                'label' => 'Sku',
            ])
            ->add('url', TextType::class, [
                'label' => 'Url',
            ])
            ->add('upc', TextType::class, [
                'label'    => 'Upc',
                'required' => false
            ])
            ->add('visibility', CheckboxType::class, [
                'label' => 'Viewable',
                'attr'  => [
                    'plugin' => 'switch'
                ]
            ])
            ->add('shortDescription', TextType::class, [
                'label' => 'Short Description'
            ])
            ->add('description', TextareaType::class, [
                'label'    => 'Description',
                'required' => false,
                'attr'     => [
                    'class' => 'ckeditor'
                ]
            ])
            ->add('categories', EntityType::class, [
                    'attr' => [
                        'oni-tree-target-input' => '1'
                    ],
                    'class'        => ProductCategory::class,
                    'choice_label' => 'name',
                    'expanded'     => true,
                    'multiple'     => true,
                ]
            )
            ->add('defaultProductCategory', EntityType::class, [
                'attr'         => [
                    'class' => 'select2',
                    'style' => 'width:25%'
                ],
                'class'        => ProductCategory::class,
                'label'        => 'Default Category',
                'label_attr'   => [
                    'class' => 'control-label'
                ],
                'placeholder'  => 'Choose an category',
            ])
            ->add('prices',CollectionType::class, [
                'label' => 'Prices',
                'entry_type' => ProductPriceType::class,
                'allow_add'    => true,
                'by_reference' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save'
            ]);

            if ($this->getProductType() && $this->getProductType()->getSafeName() == ProductTypes::COLLECTION) {
                $builder->add('variants',CollectionType::class, [
                    'label' => 'Prices',
                    'entry_type' => ProductPriceType::class,
                    'allow_add'    => true,
                    'by_reference' => false,
                ]);
            }



    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Oni\ProductManagerBundle\Entity\Product',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'attr'            => [
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

        foreach ($this->builderArray as $key => $builderArray) {

            if (!empty($builderArray['name'])
                && !empty($builderArray['type'])
                //&& new $builderArray['type'] instanceof FormTypeInterface
                && !empty($builderArray['properties']) && is_array($builderArray['properties'])
            ) {

                $builder->add($builderArray['name'], $builderArray['type'], $builderArray['properties']);

            }

        }

    }

    /**
     * @param ProductTypeEntity $productType
     * @return $this
     */
    public function setProductType(ProductTypeEntity $productType)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * @return ProductTypeEntity
     */
    public function getProductType()
    {
        return $this->productType;
    }

}
