<?php

namespace App\Form;

use App\Entity\MissionsAttr;
use App\Entity\Client;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\File;


class MissionsAttrType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dateDebutMissionsRl', DateType::class, [

            'widget' => 'single_text',

            'attr' => [
                'placeholder' => ''
            ],

            'label' => 'La date de debut  mission   ',
            /*'html5' => false,*/


        ]
    )
    ->add('dateFinMissionsRl', DateType::class, [

            'widget' => 'single_text',

            'attr' => [
                'placeholder' => ''
            ],

            /*'html5' => false,*/


        ]
    )
/*            ->add('statut')*/


            ->add('idMissionsAttr')

            ->add('idClient', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'idClient'

            ])
            ->add('idFournisseur')
           ->add('facture', FileType::class, [
               'label' => 'Facture client',
               'mapped' => false, // Tell that there is no Entity to link
               'required' => false,
               'constraints' => [
                   new File([
                       'mimeTypes' => [ // We want to let upload only txt, csv or Excel files
                           'text/x-comma-separated-values',
                           'text/comma-separated-values',
                           'text/x-csv',
                           'text/csv',
                           'text/plain',
                           'application/octet-stream',
                           'application/vnd.ms-excel',
                           'application/x-csv',
                           'application/csv',
                           'application/excel',
                           'application/pdf',
                           'application/vnd.msexcel',
                           'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                       ],
                       'mimeTypesMessage' => "This document isn't valid.",
                   ])
               ],
           ])
            ->add('nb_heures')

            ->add('valid_nb_heure',CheckboxType::class,[
                'required' => false,
                'value'=> 0,

            ])
            ->add('montant_prestation',IntegerType::class,[
                'required' => false,

            ])
            ->add('chiffre_affaire',IntegerType::class,[
                'required' => false,

            ])

            ->add('factureF', FileType::class, [
                'label' => 'Facture fornisseur',
                'mapped' => false, // Tell that there is no Entity to link
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [ // We want to let upload only txt, csv or Excel files
                            'text/x-comma-separated-values',
                            'text/comma-separated-values',
                            'text/x-csv',
                            'text/csv',
                            'text/plain',
                            'application/octet-stream',
                            'application/vnd.ms-excel',
                            'application/x-csv',
                            'application/csv',
                            'application/excel',
                            'application/pdf',
                            'application/vnd.msexcel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        ],
                        'mimeTypesMessage' => "This document isn't valid.",
                    ])
                ],
            ])

            ->add('comment_Mission_Attr',TextareaType::class,[
                'required'=>false,
            ])




        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MissionsAttr::class,
        ]);
    }
}
