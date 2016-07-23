<?php

namespace Brooter\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CMSType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aboutus', TextAreaType::class, array('attr' => ['class' => 'form-control', 'rows' => '6']))
            ->add('dmca', TextAreaType::class, array('attr' => ['class' => 'form-control', 'rows' => '6']))
            ->add('terms', TextAreaType::class, array('attr' => ['class' => 'form-control', 'rows' => '6']))
            ->add('privacypolicy', TextAreaType::class, array('attr' => ['class' => 'form-control', 'rows' => '6']))
            ->add('copyright', TextAreaType::class, array('attr' => ['class' => 'form-control', 'rows' => '6']));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brooter\AdminBundle\Entity\CMS'
        ));
    }
}
