<?php

namespace Brooter\PropertyBundle\Form;

use Brooter\AdminBundle\Entity\Area;
use Brooter\AdminBundle\Form\AddressType;
use Brooter\AdminBundle\Form\AreaType;
use Brooter\AdminBundle\Form\PropertyCateType;
use Brooter\AdminBundle\Form\PropertyOnFloorType;
use Brooter\PropertyBundle\Entity\PropertyImage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PostPropertyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('title', TextType::class, array(
                'label' => "Title",
                'attr' => array('class' => 'col-sm-9', 'placeholder' => 'Enter title ...'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('propType', EntityType::class, array(
                'class' => 'Brooter\AdminBundle\Entity\PropertyCate',
                'multiple' => false,
                'expanded' => true,
                'label' => "Type Of Property",
                'attr' => array('class' => 'col-sm-9 propTypeRadio'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('propSubCate',EntityType::class,array(
                'class' => 'Brooter\AdminBundle\Entity\PropSubCate',
                'label' => "Property Sub-category",
                'label_attr' => array('class' => 'col-sm-3'),
                'attr' => array('class' => 'col-sm-9')
            ))
            ->add('area', AreaType::class, array(
                'data_class' => 'Brooter\AdminBundle\Entity\Area',
                'label' => "Area",
                'attr' => array('class' => 'col-sm-9 ', 'placeholder' => 'Enter area ...'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('address', AddressType::class, array(
                'data_class' => 'Brooter\AdminBundle\Entity\Address',
                'label' => "Address",
                'attr' => array('class' => 'col-sm-9', 'placeholder' => 'Enter address ...'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('noofbedroom', IntegerType::class, array(
                'label' => "No. Of Bedrooom",
                'attr' => array('class' => 'col-sm-9', 'placeholder' => 'Enter No. Of Bedrooom ...', 'min' => '0'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('noofbathroom', IntegerType::class, array(
                'label' => "No. Of Bathrooms",
                'attr' => array('class' => 'col-sm-9', 'placeholder' => 'Enter No. Of Bathrooms ...', 'min' => '0'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('noofbalcony', IntegerType::class, array(
                'label' => "No. Of Balcony",
                'attr' => array('class' => 'col-sm-9', 'placeholder' => 'Enter No. Of Balcony ...', 'min' => '0'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
            ->add('totalfloor', IntegerType::class, array(
                'label' => "No. Of Floors",
                'attr' => array('class' => 'col-sm-9', 'placeholder' => 'Enter No. Of Floors ...', 'min' => '0'),
                'label_attr' => array('class' => 'col-sm-3')
            ))
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
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
            ->add('propertySpecification', CollectionType::class, array(
                'entry_type' => PropertySpecificationType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
            ->add('propertyImage', CollectionType::class, array(
                'entry_type' => PropertyImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
            ->add('propPossesion')
            ->add('description');
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
