<?php

namespace App\Form;

use App\Entity\Lessen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tijd')
            ->add('datum')
            ->add('locatie')
            ->add('max_personen')
            ->add('training')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lessen::class,
        ]);
    }
}
