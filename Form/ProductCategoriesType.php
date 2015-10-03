<?php

namespace Cms\ProductManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductCategoriesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('active')
            ->add('parentProductCategoryId')
            ->add('created')
            ->add('modified')
            ->add('modifiedBy')
            ->add('parent')
            ->add('products')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cms\ProductManagerBundle\Entity\ProductCategories'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_productmanagerbundle_productcategories';
    }
}
