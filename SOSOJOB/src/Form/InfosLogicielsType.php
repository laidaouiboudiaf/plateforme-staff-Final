<?php

namespace App\Form;

use App\Entity\InfosLogiciels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosLogicielsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLogiciel')
            ->add('niveau')
            ->add('idFournisseur')
            ->add('idMissions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfosLogiciels::class,
        ]);
    }
}
