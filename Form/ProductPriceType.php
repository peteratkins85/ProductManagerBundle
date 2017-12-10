<?php

namespace App\Oni\ProductManagerBundle\Form;

use App\Oni\CoreBundle\Entity\Currency;
use App\Oni\CoreBundle\Entity\Zone;
use App\Oni\ProductManagerBundle\Entity\ProductPrices;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductPriceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productId', HiddenType::class, [
            ])
            ->add('nowPrice', TextType::class, [

            ])
            ->add('wasPrice', TextType::class, [

            ])
            ->add('wholesalePrice', TextType::class, [])
            ->add('currency', EntityType::class, [
                'class'        => Currency::class,
                'choice_label' => 'Currency',
            ])
            ->add('zone', EntityType::class, [
                'class'        => Zone::class,
                'choice_label' => 'Zone',
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ProductPrices::class,
            'data-gg'    => 'black',
        ));
    }
    }
