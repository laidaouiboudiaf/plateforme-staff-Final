<?php

namespace App\Form;

use App\Entity\InfosLangues;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosLanguesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLangue')
            ->add('niveau')
            ->add('idFournisseur')
            ->add('idMissions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfosLangues::class,
        ]);
    }
}
