<?php

namespace App\Form;

use App\Entity\Persoon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersoonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loginnaam')
            ->add('wachtwoord', passwordType::class)
            ->add('naam')
            ->add('achternaam')
            ->add('tussenvoegsel')
            ->add('geboortedatum')
            ->add('gender')
            ->add('email')
            ->add('aanneemdatum')
            ->add('salaris')
            ->add('straat')
            ->add('postcode')
            ->add('plaats')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persoon::class,
        ]);
    }
}
