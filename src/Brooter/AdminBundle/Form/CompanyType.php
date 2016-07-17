<?php

namespace Brooter\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('field1', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field2', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field3', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field4', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field5', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field6', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field7', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field8', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field9', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field10', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field11', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field12', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field13', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field14', TextType::class, array('attr'=>['class' => 'col-md-6']))
            ->add('field15', TextType::class, array('attr'=>['class' => 'col-md-6']));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brooter\AdminBundle\Entity\Company',
        ));
    }
}