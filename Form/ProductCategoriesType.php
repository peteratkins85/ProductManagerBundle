<?php

namespace Cms\ProductManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Cms\ProductManagerBundle\Entity\Repository\ProductCategoriesRepository;
use Cms\ProductManagerBundle\Entity\ProductCategories as ProductCategory;
use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions as ProductCategoryDefinitions;
use Cms\CoreBundle\Entity\Languages as Languages;

class ProductCategoriesType extends AbstractType
{

    /**
     * @var ProductCategoriesRepository object
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
        $this->productCategoriesRepository = $this->container->get('product_categories_repository');
        $this->productCategoryDefinitionsRepository = $this->container->get('product_categories_definitions_repository');

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder

            ->add('definitions', 'Symfony\Component\Form\Extension\Core\Type\CollectionType', array(
                'entry_type' => ProductCategoryDefinitionsType::class
            ))
            ->add('parent', ChoiceType::class , array(
                'choices' => $this->productCategoriesRepository->findAll(),
                'choices_as_values' => true,
                'attr' => array('class' => 'select2 input-block-level'),
                'choice_label' => function($category, $key, $index) {
                    /** @var ProductCategory $category */
                    //var_dump($category->getDefinitions()); exit;
                    foreach ($category->getDefinitions() as $definition){
                        /** @var ProductCategoryDefinitions $definition */
                        //var_dump($this->languageId);exit;
                        if ($definition->getLanguage()->getId() == $this->languageId){
                            return $definition->getProductCategoryName();
                        }
                    }

                },
                'by_reference' => false,
                'required' => true,
//                'choice_attr' => function($val, $key, $index) {
//                    // adds a class like attending_yes, attending_no, etc
//                    return ['class' => 'attending_'.strtolower($key)];
//                },
                )
            )
            ->add('add', SubmitType::class, array(
                'attr' => array('class' => 'save')
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
