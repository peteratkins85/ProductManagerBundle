<?php

namespace Oni\ProductManagerBundle\Form;

use Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use Oni\ProductManagerBundle\Entity\ProductOptionGroupType;
use Oni\ProductManagerBundle\Service\ProductOptionService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductOptionGroupForm extends AbstractType
{

    /**
     * @var ProductOptionService
     */
    protected $productOptionService;

    public function __construct(ProductOptionService $productOptionService)
    {
        $this->productOptionService = $productOptionService;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [

            ])
            ->add('optionGroupType', EntityType::class, [
                'label'        => 'Group Type',
                'class'        => ProductOptionGroupType::class,
                'choices'      => $this->productOptionService->getAllProductOptionGroupTypes(),
                'attr'         => ['class' => 'select2 input-xlarge'],
                'choice_label' => function (ProductOptionGroupType $optionGroupType, $key, $index) {
                    return $optionGroupType->getName();
                },
            ])
            ->add('add', SubmitType::class, [
                    'attr'  => ['class' => 'btn btn-primary'],
                    'label' => 'Save'
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Oni\ProductManagerBundle\Entity\ProductOptionGroup',
            'attr' => [
                'data-parsley-validate' => ''
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oni_productmanagerbundle_productoptiongroup';
    }


}
