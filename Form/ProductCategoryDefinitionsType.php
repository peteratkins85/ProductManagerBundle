<?php

namespace Cms\ProductManagerBundle\Form;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use appDevDebugProjectContainer ;

class ProductCategoryDefinitionsType extends AbstractType
{
    /**
     * @param ContainerInterface $container
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
//    public function __construct(ContainerInterface $container, $session){
//
//        $this->container = $container;
//        $this->productCategoriesRepository = $this->container->get('product_categories_repository_service');
//        $this->productCategoryDefinitionsRepository = $this->container->get('product_categories_definitions_repository_service');
//
//
//    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productCategoryId', HiddenType::class)
            ->add('languageId', TextType::class)
            ->add('productCategoryName', TextType::class)
            ->add('productCategory', HiddenType::class)
            ->add('language', HiddenType::class)
        ;
    }
    


    /**
     * @param  OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'product_category_definitions';
    }
}
