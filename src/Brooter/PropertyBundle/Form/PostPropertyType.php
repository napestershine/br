<?php

namespace Brooter\PropertyBundle\Form;

use Brooter\AdminBundle\Form\AddressType;
use Brooter\AdminBundle\Form\AreaType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
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
            ->add('title')
            ->add('propType', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\PropertyCate',
                'multiple' => false,
                'expanded' => true,
            ))

            ->add('area',AreaType::class,array(
                'data_class' => 'Brooter\AdminBundle\Entity\Area'
            ))

           
            ->add('address', AddressType::class,array(
                'data_class' => 'Brooter\AdminBundle\Entity\Address',
            ))
            ->add('noofbedroom')
            ->add('noofbathroom')
            ->add('noofbalcony')
            ->add('totalfloor')
            ->add('propOnFloor')
            ->add('reservedParking', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\ReservedParking',
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('expectedPrice')
            ->add('availability', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\Availability',
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('ageOfProp')
            ->add('ownership')
            ->add('overLooking', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\Overlooking',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('waterSource', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\WaterSource',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('powerBackup', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\PowerBackup',
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('typeOfFlooring', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\TypeOfFlooring',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('_furnished', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\furnished',
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('propFeatureAmen', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\PropFeatureAmen',
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('propertyFacing')
            ->add('materialUsed')
            ->add('yearBuilt')
            ->add('floorPlans', CollectionType::class, array(
                'entry_type' => FloorPlansType::class,
                'label' => 'Floor Plan',
                'allow_add' =>  true,
                'allow_delete' => true,
                'by_reference'=>false,
                'prototype' => true,
            ))

            ->add('propPossesion')
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brooter\PropertyBundle\Entity\PostProperty',
            'cascade_validation' => true,
        ));
    }
}
