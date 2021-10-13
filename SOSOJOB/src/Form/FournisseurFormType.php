<?php

namespace App\Form;

use App\Entity\Fournisseur;
use App\Entity\TypeDemission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue ;





class FournisseurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('add',SubmitType::class)
            /*->add('statut',HiddenType::class,[
                    'data'=>'statut_créer par sosjob'])*/
            ->add('numero_titre_sejour',TextType::class,['label'=>'Numéro du titre de séjour','required'=>"",
                // 'attr'=>[
                //     'value'=>'',
                // ],
            ])
            ->add('departement_delivrance',TextType::class,['label'=>'Département de délivrance','required'=>""])
            ->add('ville_delivrance',TextType::class,['label'=>'Ville de délivrance','required'=>""])
            ->add('date_expiration_titre_sejour',DateType::class,['label'=>"Date d'expiration"])

            ->add('nom_pere',TextType::class,['label'=>'Nom du pére'])
            ->add('prenom_pere',TextType::class,['label'=>'Prénom du pére'])
            ->add('nom_mere',TextType::class,['label'=>'Nom de la mére'])
            ->add('prenom_mere',TextType::class,['label'=>'Prénom de la mére'])
            ->add('etablissement_UE',ChoiceType::class,['label'=>' Avez-vous d’autre établissement dans l’union européenne  ' ,'choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ],
                'expanded' => true,
                'multiple' =>false,
                'label_attr'=>[
                    'class'=>'radio-inline',
                ],
            ])
            ->add('ressortissant_hors_UE',ChoiceType::class,['label'=>'Êtes-vous ressortissant hors union européenne ' ,'choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ],
                'expanded' => true,
                'multiple' =>false,
                'label_attr'=>[
                    'class'=>'radio-inline',
                ],
            ])

            ->add('activite_salarie',ChoiceType::class,['label'=>false ,'choices' => [
                'Non' => 'NON',
                'Salariée' => 'OUI',
                'Autres' => 'Autres',
            ],
                'expanded' => true,
                'multiple' =>false,
                'label_attr'=>[
                    'class'=>'radio-inline',

                ],
                'choice_attr'=>[
                    'style' => 'color:blue',
                ],
            ])

            ->add('genre',ChoiceType::class,['label'=>' GENRE ' ,'choices' => [
                ' Homme ' => 'Homme',
                ' Femme ' => 'Femme',
            ],
                'expanded' => true,
                'multiple' =>false,
                'label_attr'=>[
                    'class'=>'radio-inline',
                ],
            ])

            // ->add('lieuDeNaissance')
            // ->add('add',SubmitType::class)
            ->add('nationalite',CountryType::class,['label'=>'Nationalié'])
            ->add('adresseF',TextType::class,['label'=>'Adresse  De Résidence'])
            ->add('numero_securiteSociale',IntegerType::class,['label'=>'Numéro Sécurité Social'])
            ->add('situation',ChoiceType::class,['label'=>'ETES-VOUS MARIÉ / PACES' ,
                'choices' => [
                    'Oui' => 'MARIÉ / PACES',
                    'Non' => 'CELIBATAIRE',],
                'expanded' => true,
                'label_attr'=>[
                    'class'=>'radio-inline'
                ]
            ])


            ->add('photo', FileType::class, [
                'label' => 'Upload une Photo ',

                'mapped' => false,

                'required' => false,
              //  'attr'=> ['accept' => 'image/jpeg,image/png',],

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('permis', FileType::class, [
                'label' => 'Permis (Upload maintenant ou plus tard)',

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('justificatif_domicile', FileType::class, [
                'label' => 'Justificatif de domicile de moins de 3 mois « * »',

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])


            ->add('ci', FileType::class, [
                'label' => "La Carte d'identité ou le titre de séjour « * »",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])


            ->add('signature', FileType::class, [
                'label' => 'Signature en Photo  « * » ',

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            // ->add('idLangues',LocaleType::class,['label'=>'Langues'])
            // ->add('idFormations')
            // ->add('statut')
            // ->add('Fournisseur_TypeMission')
            // ->add('Fournisseur_TypeMission', EntityType::class, [
            //     'class' => TypeDemission::class,
            //     'query_builder' => function (EntityRepository $er) {
            //         return $er->createQueryBuilder('u')
            //             ->orderBy('u.nomTypeMission', 'ASC');
            //     },
            //     'choice_label' => 'nomTypeMission',
            //     'multiple'=>true,
            //     'expanded'=>true,
            // ])

            ->add('Fournisseur_TypeMission', EntityType::class, [
                'label'=> 'Type de Mission',
                // looks for choices from this entity
                'class' => TypeDemission::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'nomTypeMission',

                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,

            ])

            // ->add('Fournisseur_TypeMission',ChoiceType::class,['label'=>'Type de Missions'])
            // ->add('idUsers')
            // ->add('is_available', CheckboxType::class,['label'=>'Je certifie que ces informations sont exactes et je donne procuration à sos job pour effectuer les formalités de création de mon statut auto-entrepreneur.
            // '])

            ->add('is_available', CheckboxType::class, [
                'label'=>'Je certifie que ces informations sont exactes et je donne procuration à sos job pour effectuer les formalités de création de mon statut auto-entrepreneur.
                ',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should is available.',
                    ]),
                ],
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'label'=>'Je déclare sur l’honneur, conformément aux dispositions de l’article A.123-51 du Code de commerce, n’avoir fait l’objet d’aucune condamnation pénale ni de sanction civile ou administrative de nature à m’interdire — soit d’exercer une activité commerciale — soit de gérer, d’administrer ou de diriger une personne morale.
                 ',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])

            ->add('accre',ChoiceType::class,['label'=>false ,
                'choices' => [
                    ' oui ' => 'Oui',
                    ' non ' => 'Non',
                ],
                'expanded' => true,
                'multiple' =>false,
                'label_attr'=>[
                    'class'=>'radio-inline',
                ],
            ])

            ->add('h_PoleEmploi', FileType::class, [
                'label' => "Upload l'historique d'inscription à Pôle Emploi",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('ABM', FileType::class, [
                'label' => "Upload l'attestation de Bénéficiare des aides mentionnées",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('NDP', FileType::class, [
                'label' => "Upload la notification d'ouverture de droit ou dernier titre de paiement",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('ANC', FileType::class, [
                'label' => "Upload l'attestation de non indemnisation de l'asurance chômage",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('JPHD', FileType::class, [
                'label' => "Upload le justificatif de personne handicapée délivré",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('ZUS', FileType::class, [
                'label' => "Upload le justificatif de l'adresse de l'établissement dans la ZUS",

                'mapped' => false,

                'required' => false,

                'constraints' => [
                    new File([
                        'maxSize' => '3024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'application/jpeg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])

            ->add('tu_es',ChoiceType::class,['label'=>false ,'choices' => [
                "Sélectionner la situation qui vous correspond"=>"",
                'Jeune de 18 à 25' => 'Jeune de 18 à 25',
                "Demandeur d'emploi non indemnisé inscrit à Pôle Emploi" => "Demandeur d'emploi non indemnisé inscrit à Pôle Emploi",
                "Bénéficiare du RSA ou de l'ASS" => "Bénéficiare du RSA ou de l'ASS",
                "Demandeur d'emploi indemnisé" => "Demandeur d'emploi indemnisé",
                "Personne de - de 30ans non indemnisée" => "Personne de - de 30ans non indemnisée",
                'Personne de - de 3Oans reconnue handicapée' => 'Personne de - de 3Oans reconnue handicapée',
                'Personne céant une entreprise en ZUS' => 'Personne céant une entreprise en ZUS',

            ],
                'required'=>"",
                'expanded' => false,
                'multiple' =>false,
                'label_attr'=>[
                    'class'=>'radio-inline',

                ],
                'choice_attr'=>[

                ],
            ])


            // ->add('idLangages', EntityType::class, [
            //     // looks for choices from this entity
            //     'class' => InfosLangages::class,

            //     // uses the User.username property as the visible option string
            //     'choice_label' => 'nomLangage',

            //     // used to render a select box, check boxes or radios
            //      'multiple' => true,
            //     //  'expanded' => true,
            //      'label_attr'=>[
            //         'class'=>'radio-inline'
            //     ]
            // ])
            // ->add('idPermis')
            // ->add('procuration', CheckboxType::class, [
            //     'label'=>'Procuration pour effectuer les formalités de constitution entreprise individuelle
            //     ',
            //     'mapped' => false,
            //     'constraints' => [
            //         new IsTrue([
            //             'message' => 'You should agree to our terms.',
            //         ]),
            //     ],
            // ])

            // ->add('joursDisponible')
            // ->add('idCertifications')
            // ->add('idLangages')
            // ->add('idLogiciels')
            // ->add('ci',FileType::class,['label'=>"Upload la carte d'dentité "])
            // ->add('Etablissement',TextType::class,['label'=>"Avez d'autre établisssement dans l'union Europeen hors France"])
            //MARIE / PACES (pour la création du statut)


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}
