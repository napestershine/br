<?php

namespace Brooter\PropertyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostPropertyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('propType')
            ->add('listPropFor')
            ->add('area')
            ->add('address')
            ->add('reservedParking')
            ->add('availability')
            ->add('ownership')
            ->add('overLooking')
            ->add('waterSource')
            ->add('powerBackup')
            ->add('typeOfFlooring')
            ->add('_furnished')
            ->add('propFeatureAmen')
            ->add('propPossesion')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brooter\PropertyBundle\Entity\PostProperty'
        ));
    }
}
