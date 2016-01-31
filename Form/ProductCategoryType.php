<?php

namespace Oni\ProductManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Oni\ProductManagerBundle\Entity\Repository\ProductCategoryRepository;
use Oni\ProductManagerBundle\Entity\ProductCategory as ProductCategory;
use Oni\ProductManagerBundle\Entity\ProductCategoryDefinitions as ProductCategoryDefinitions;
use Oni\CoreBundle\Entity\Languages as Languages;

class ProductCategoryType extends AbstractType
{

    /**
     * @var ProductCategoryRepository object
     */
    protected $productCategoriesRepository;
    /** @var Languages $language */
    public $language;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
    public function __construct($container){

        $this->container = $container;
        $this->locale = $this->container->get('oni_get_locale');
        $this->ProductCategoryRepository = $this->container->get('oni_product_categories_repository');

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $buttonName = $options['data']->getId() > 0 ? 'Save' : 'Add';
        $id = $options['data']->getId();
        $exclude = $id;

        $builder
            ->add('productCategoryName', TextType::class, array(
                'label'=>'Name',
            ))
            ->add('productCategoryUrl', TextType::class, array(
                'label'=>'CategoryUrl',
            ))
            ->add('viewable', CheckboxType::class, array(
                'label'=>'Viewable',
                'attr' => array(
                    'plugin' => 'switch'
                )
            ))
            ->add('description', TextareaType::class, array(
                'label'=>'Description',
                'required' => false,
                'attr'=> array(
                    'class'=>'ckeditor'
                )
            ))
            ->add('metaTitle', TextType::class, array(
                'label'=>'Meta Title',
                'required' => false,
            ))
            ->add('metaDescription', TextareaType::class, array(
                'label'=>'Meta Description',
                'required' => false,
            ))
            ->add('metaKeyWords', TextType::class, array(
                'label'=>'Meta Keys Words',
                'required' => false,
            ))
            ->add('parent', ChoiceType::class , array(
                'choices' => $this->ProductCategoryRepository->findAllWithFallBack($exclude),
                'attr' => array('class' => 'select2 input-xlarge'),
                'choice_label' => function($category, $key, $index) {
                    return $category->getProductCategoryName();
                },
                'by_reference' => false,
                )
            )
            ->add('add', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary'),
                'label' => $buttonName
                )
            )
        ;
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oni\ProductManagerBundle\Entity\ProductCategory',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'oni_product_category';
    }
}
