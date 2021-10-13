<?php

namespace App\Form;

use App\Entity\Missions;
use App\Entity\PermisType;
use App\Entity\TypeDemission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MissionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objetMissions', TextType::class, ['label' => 'Titre de la mission'])
            ->add('descriptionMissions', TextareaType::class, [

                'label' => 'Description de la mission',
                'error_bubbling' => true,

            ])
            ->add('typeDemission', EntityType::class, [
                'label' => 'Catégorie de la mission *',
                // looks for choices from this entity
                'class' => TypeDemission::class,


                'placeholder' => ' Sélectionner une catégorie de mission ',


                'choice_attr' => [
                    'style' => 'color:blue',
                ],
            ])
            ->add('nombreJobber',IntegerType::class,[
                'label' => 'Nombre de jober
 '

            ])
            ->add('dateDebutMissionsPr', DateType::class, [

                    'widget' => 'single_text',


                    /*                    'attr' => ['class' => 'js-datepicker'],*/
                    'label' => 'Date début de mission
  ',
                    /*'html5' => false,*/


                ]
            )
            ->add('dateFinMissionsPr', DateType::class, [
                'widget' => 'single_text',

                'attr' => ['class' => 'js-datepicker'],


                'label' => 'Date fin de mission*  ',


            ])
            ->add('heures_Fin_Missions', TimeType::class,
                [

                    'label' => 'Horaire de fin  ',


                ])
            ->add('heures_Debut_Missions', TimeType::class,
                [

                    'label' => 'Horaire de début ',


                ])
            ->add('heures_Debut_Pause', TimeType::class,
                [

                    /*                    'attr' => ['class' => 'js-datepicker'],*/
                    'label' => 'Début de pause  ',
                    'html5' => false,


                ])
            ->add('heure_Fin_Pause', TimeType::class,
                [

                    /*                    'attr' => ['class' => 'js-datepicker'],*/
                    'label' => 'Fin de pause
 ',
                    'html5' => false,


                ])
            ->add('detailSuplimentaire', TextareaType::class, [
                'label' => 'Détails supplémentaires 
 ',
                'required' => false
            ])
            ->add('Adresse_contact', TextType::class, ['label' => 'Adresse complète'])
            ->add('nomContact', TextType::class, ['label' => 'Nom'])
            ->add('prenomContact', TextType::class, ['label' => 'Prenom'])
            ->add('telContact', NumberType::class, ['label' => 'Numéro de téléphone'])
            ->add('emailContact', EmailType::class, [
                    'attr' => [
                        'placeholder' => 'Exemple : exmple@gmail.com',
                    ]

                    , 'label' => 'E-mail'
                ]

            )
            ->add('infoSuplementaires', TextareaType::class, [
                'required' => false,
                'label' => '  Information complémentaire'


            ])
            ->add('equipement', TextType::class, [
                'required' => false,

                'attr' => [
                    'placeholder' => 'Exemple : Les gants...',

                ],])
            ->add('permis_Mission', TextType::class, [

                'required' => false,

                'label' => 'Type du Permis ',
                // looks for choices from this entity
                'attr' => [
                    'placeholder' => 'la catégorie du permis ']


            ])
            ->add('Categorie_Autre', TextType::class, [
                'required' => false,

                'attr' => [
                    'placeholder' => 'Veuillez renseigner la categorie']
            ]);
           # ->add('submit', SubmitType::class);
        //un point a regarder avec diop
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}
