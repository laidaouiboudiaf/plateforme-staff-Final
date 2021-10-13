<?php

namespace App\Form;

use App\Entity\Missions;
use App\Entity\PermisType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objetMissions')
            ->add('descriptionMissions')
            ->add('dateDebutMissionsPr')
            ->add('dateFinMissionsPr')
		   ->add('nombreJobber',IntegerType::class,[
                'label' => 'Nombre de jober'
		   ])
            ->add('heures_Fin_Missions', TimeType::class,
                [

                    'label' => 'Heure de fin   ',


                ])
            ->add('heures_Debut_Missions', TimeType::class,
                [

                    'label' => 'Heure de debut  ',


                ])
            ->add('heures_Debut_Pause', TimeType::class,
                [

                    /*                    'attr' => ['class' => 'js-datepicker'],*/
                    'label' => 'Heure de debut pause  ',
                    'html5' => false,


                ])
            ->add('heure_Fin_Pause', TimeType::class,
                [
                    'required' => true,

                    /*                    'attr' => ['class' => 'js-datepicker'],*/
                    'label' => 'Heure de fin pause ',
                    'html5' => false,


                ])
            ->add('detailSuplimentaire', TextareaType::class, [
                'label' => 'Details suplimentaires ',
            ])
            ->add('Adresse_contact', TextType::class)
            ->add('nomContact', TextType::class)
            ->add('prenomContact', TextType::class)
            ->add('telContact', NumberType::class)
            ->add('emailContact', EmailType::class, [
                    'attr' => [
                        'placeholder' => 'Exemple : exmple@gmail.com',
                    ]]
            )
            ->add('infoSuplementaires', TextareaType::class)
            ->add('equipement', TextType::class, [
                'attr' => [
                    'placeholder' => 'Exemple : Les gants...',
                ],])

            ->add('permis_Mission',TextType::class,[


                'label' => 'Type Permis *',


                'attr' => [
                    'placeholder' => '  La catégorie du permis '

                ]



            ]) ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}
