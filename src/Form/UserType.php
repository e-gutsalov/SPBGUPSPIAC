<?php

namespace App\Form;

use App\Entity\User;
use App\Repository\AccessRolesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function __construct(private readonly AccessRolesRepository $accessRolesRepository)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $r = [];
        $roles = $this->accessRolesRepository->findAll();
        foreach ($roles as $role) {
            $r[$role->getName()] = $role->getName();
        }

        $user = new User();
//        dump($builder->getData()->getRoles());exit();
        $builder
            ->add('login')
//            ->add('roles', EntityType::class, [
//                'class' => AccessRoles::class,
//                'choice_label' => 'name',
//                'choice_value' => 'name',
//                'required'  => true,
//                'multiple'=> true,
//                'expanded' => true,
//            ])
            ->add('roles', ChoiceType::class, [
                'choices' => $r,
                'required'  => true,
                'multiple'=> true,
                'expanded' => true,
            ])
            ->add('plainPassword', PasswordType::class, [
                'hash_property_path' => 'password',
                'mapped' => false,
                'required'  => false,
            ])
            ->add('FIO')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
