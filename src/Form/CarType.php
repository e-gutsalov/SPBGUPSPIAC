<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\SimpleDirectory;
use App\Entity\TreeDirectory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('horses')
            ->add('lVt')
            ->add('dateProduction', DateType::class, [
                'html5' => false,
            ])
            ->add('dateTimeProduction', DateTimeType::class, [
                'html5' => false,
            ])
            ->add('image', FileType::class, [
                'required' => false
            ])
            ->add('documentation', FileType::class, [
                'required' => false
            ])
            ->add('simple', EntityType::class, [
                'class' => SimpleDirectory::class
            ])
            ->add('tree', EntityType::class, [
                'class' => TreeDirectory::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
