<?php

namespace Oni\ProductManagerBundle\Form;


use Oni\CoreBundle\CoreGlobals;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
    public function __construct(ContainerInterface $container){

        $this->container = $container;
        $this->language = $this->container->get('oni_language_repository')->getDefaultLanguage();

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('productCategoryName', TextType::class,array(
                'label'=>'Name'
            ))
        ;
    }
    


    /**
     * @param  OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'oni_product_category_definitions';
    }
}
