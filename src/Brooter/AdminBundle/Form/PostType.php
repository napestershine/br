<?php

namespace Brooter\AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class PostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('content', TextareaType::class, ['attr' => ['class' => 'form-control']])
            ->add('category', EntityType::class, ['attr' => ['class' => 'form-control'],
                'placeholder' => '-- Select Blog Category --',])
            ->add('file', FileType::class, array('label' => 'Image (jpg/jpeg/png file)',
                'data_class' => null, 'attr' => ['class' => 'form-control', 'required' => false]));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Brooter\AdminBundle\Entity\Post'
        ));
    }
}
