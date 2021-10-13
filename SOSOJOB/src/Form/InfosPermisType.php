<?php

namespace App\Form;

use App\Entity\InfosPermis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosPermisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomPermis')
            ->add('dateObtention')
            ->add('paysObtention')
            ->add('idFournisseur')
            ->add('idMissions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfosPermis::class,
        ]);
    }
}
