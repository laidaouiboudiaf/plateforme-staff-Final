<?php

namespace App\Form;

use App\Entity\InfosBancairesF;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosBancairesFType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulaireDuCompte')
            ->add('iban')
            ->add('idFournisseur')
            ->add('SIRET')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfosBancairesF::class,
        ]);
    }
}
