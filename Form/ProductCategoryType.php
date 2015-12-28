<?php

namespace Cms\ProductManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;
use Cms\ProductManagerBundle\Entity\ProductCategory as ProductCategory;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions as ProductCategoryDefinitions;
use Cms\CoreBundle\Entity\Languages as Languages;

class ProductCategoryType extends AbstractType
{

    /**
     * @var ProductCategoryRepository object
     */
    protected $productCategoriesRepository;
    protected $productCategoryDefinitionsRepository;
    /** @var Languages $language */
    public $language;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
    public function __construct($container, $session){

        $this->container = $container;
        $this->languageId = $this->container->get('get_language');
        $this->ProductCategoryRepository = $this->container->get('product_categories_repository');
        $this->productCategoryDefinitionsRepository = $this->container->get('product_categories_definitions_repository');

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder

            ->add('productCategoryName', TextType::class, array(
                'label'=>'Name'
            ))
            ->add('parent', ChoiceType::class , array(
                'choices' => $this->ProductCategoryRepository->findAll(),

                'attr' => array('class' => 'select2 input-block-level'),
                'choice_label' => function($category, $key, $index) {
                    return $category->getProductCategoryName();

                },
                'by_reference' => false,
                )
            )
            ->add('add', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary')
                )
            )
        ;
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cms\ProductManagerBundle\Entity\ProductCategory',
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
