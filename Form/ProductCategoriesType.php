<?php

namespace Cms\ProductManagerBundle\Form;

use Cms\CoreBundle\CoreGlobals;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\CollectionTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoriesRepository;
use Cms\ProductManagerBundle\Form\ProductCategoryDefinitionsType;
use Symfony\Component\Form\FormRegistry;

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

        if ($session->get('languages')){



        }else{

            $this->langaugeId = '1';


        }
        $this->container = $container;

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $productCategoryDefinitionsForm = $this->container->get('product_category_definitions_form');
        $builder

            ->add('definitions', 'Symfony\Component\Form\Extension\Core\Type\CollectionType', array(
                    'entry_type' => ProductCategoryDefinitionsType::class
            ))
            ->add('parent', EntityType::class , array(
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