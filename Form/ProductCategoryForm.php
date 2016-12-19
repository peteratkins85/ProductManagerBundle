<?php

namespace Oni\ProductManagerBundle\Form;

use Oni\ProductManagerBundle\Service\ProductCategoryService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Oni\ProductManagerBundle\Entity\ProductCategory as ProductCategory;
use Oni\CoreBundle\Entity\Languages as Languages;

class ProductCategoryForm extends AbstractType
{

    /**
     * @var ProductCategoryService
     */
    protected $productCategoryService;

    /**
     * @var string
     */
    protected $locale;

    /**
     * ProductCategoryType constructor.
     * @param ProductCategoryService $productCategoryService
     * @param string $locale
     */
    public function __construct(ProductCategoryService $productCategoryService, string $locale)
    {
        $this->locale = $locale;
        $this->productCategoryService = $productCategoryService;
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
            ->add('name', TextType::class, [
                'label' => 'Name',
            ])
            ->add('url', TextType::class, [
                'label' => 'CategoryUrl',
            ])
            ->add('viewable', CheckboxType::class, [
                'label' => 'Viewable',
                'attr'  => [
                    'plugin' => 'switch'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label'    => 'Description',
                'required' => false,
                'attr'     => [
                    'class' => 'ckeditor'
                ]
            ])
            ->add('metaTitle', TextType::class, [
                'label'    => 'Meta Title',
                'required' => false,
            ])
            ->add('metaDescription', TextareaType::class, [
                'label'    => 'Meta Description',
                'required' => false,
            ])
            ->add('metaKeyWords', TextType::class, [
                'label'    => 'Meta Keys Words',
                'required' => false,
            ])
            ->add('parent', ChoiceType::class, [
                    'choices'      => $this->productCategoryService->findAllWithFallBack($exclude),
                    'attr'         => ['class' => 'select2 input-xlarge'],
                    'choice_label' => function (ProductCategory $category, $key, $index) {
                        return !empty($category->getName()) ? $category->getName() : $category->getUrl();
                    },
                    'by_reference' => false,
                ]
            )
            ->add('add', SubmitType::class, [
                    'attr'  => ['class' => 'btn btn-primary'],
                    'label' => $buttonName
                ]
            );
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => 'Oni\ProductManagerBundle\Entity\ProductCategory',
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'oni_product_category';
    }
}
