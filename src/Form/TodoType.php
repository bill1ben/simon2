<?php

namespace App\Form;

use App\Entity\Label;
use App\Entity\Priority;
use App\Entity\Todo;
use App\Entity\Urlimage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('done')
            ->add('description', TextareaType::class,[
                'required' => false
            ])
            ->add('priority', EntityType::class, [
                'class' => Priority::class
            ])
            ->add('urlimage', UrlimageType::class, [
                'required' => false
            ])
            ->add('labels', EntityType::class, [
                'class' => Label::class,
                'multiple' => true,
                'expanded' => true
            ])
            ->add('comments', CollectionType::class, [
                'attr' => ['class' => 'todo-comments'],
                'entry_type' => CommentType::class,
                'entry_options' => ['label' => false, 'attr' => ['class' => 'comment-row']],
                'prototype'=> true,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'empty_data'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
