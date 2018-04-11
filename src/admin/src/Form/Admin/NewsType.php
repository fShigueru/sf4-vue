<?php

namespace App\Form\Admin;

use App\Entity\Admin\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,
                [
                    'label' => 'Título',
                    'documentation' => [
                        'type' => 'string',
                        'description' => 'Título da notícia',
                    ],
                ]
            )
            ->add('description', TextareaType::class, ['label' => 'Descrição', 'attr' => ['class' => 'form-control']])
            ->add('capa', FileType::class, ['data_class' => null])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}

