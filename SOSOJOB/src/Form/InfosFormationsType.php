<?php

namespace App\Form;

use App\Entity\InfosFormations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosFormationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEtablissement')
            ->add('domaineEtudes')
            ->add('diplome')
            ->add('debut')
            ->add('fin')
            ->add('idFournisseur')
            ->add('idMissions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfosFormations::class,
        ]);
    }
}
