<?php

namespace App\Form;

use App\Entity\MissionsAttr;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionAttrValidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nb_heures')
            ->add('valid_nb_heure', CheckboxType::class, [
                    'required' => false,
                    'value' => 0]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MissionsAttr::class,
        ]);
    }
}
