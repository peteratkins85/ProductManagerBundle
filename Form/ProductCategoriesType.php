<?php

namespace Cms\ProductManagerBundle\Form;

use Cms\CoreBundle\CoreGlobals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoriesRepository;
use Cms\ProductManagerBundle\Form\ProductCategoryDefinitionsType;

class ProductCategoriesType extends AbstractType
{

    /**
     * @var ProductCategoriesRepository object
     */
    protected $productCategoriesRepository;
    protected $productCategoryDefinitionsRepository;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
    public function __construct($container, $session){

        var_dump($session); exit;
        $this->container = $container;
        $this->productCategoriesRepository = $this->container->get('product_categories_repository_service');
        $this->productCategoryDefinitionsRepository = $this->container->get('product_categories_definitions_repository_service');

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $productCategoryDefinitionsForm = $this->container->get('product_category_definitions_form');

        $builder
            ->add('definitions', 'collection', array(
                    'type' => $productCategoryDefinitionsForm,
                    'by_reference' => false
            ))
            ->add('parent', 'entity', array(
                'class' => CoreGlobals::PRODUCT_CATEGORIES_ENTITY,
                'choices' => $this->productCategoriesRepository->getFormProductCategoryChoices(),
                'placeholder' => 'Select parent category'
                )
            )
            ->add('add', 'submit', array(
                'attr' => array('class' => 'save'),
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cms\ProductManagerBundle\Entity\ProductCategories',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'product_category';
    }
}
