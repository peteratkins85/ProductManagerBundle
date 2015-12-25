<?php

namespace Cms\ProductManagerBundle\Form;


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
        $this->language = $this->container->get('language_repository')->getDefaultLanguage();

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $languageId = $this->container->get('get_language');
        $language = $this->container->get('language_repository')->find($languageId);

        $builder
            ->add('productCategoryName', TextType::class)
            ->add('language', ChoiceType::class , array(
                    'choices' => $this->container->get('language_repository')->findAll(),
                    'choices_as_values' => true,
                    'attr' => array('class' => 'select2 input-block-level'),
//                    'choice_label' => function($category, $key, $index) {
//                        /** @var ProductCategory $category */
//                        //var_dump($category->getId()); exit;
//                        foreach ($category->getDefinitions() as $definition){
//                            /** @var ProductCategoryDefinitions $definition */
//                            if ($definition->getLanguage()->getId() == $this->languageId){
//                                return $definition->getProductCategoryName();
//                            }
//                        }
//
//                    },
                    'by_reference' => false,
                    'required' => true,

            ))
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
