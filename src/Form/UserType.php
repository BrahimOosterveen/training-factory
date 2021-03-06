<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
//            ->add('roles')
            ->add('password',passwordType::class)
//            ->add('loginnaam')
            ->add('naam')
            ->add('tussenvoegsel')
            ->add('achternaam')
            ->add('geboortedatum', BirthdayType::class, [
                // this is actually the default format for single_text
                'format' => 'dd-MM-yyyy',
            ])
            ->add('gender')
//            ->add('aanneemdatum')
//            ->add('salaris')
            ->add('straat')
            ->add('postcode')
            ->add('plaats')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
