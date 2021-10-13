<?php

namespace App\Form;

use App\Entity\Fournisseur;
use App\Entity\TypeDemission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresseF')
            ->add('genre')
            ->add('lieuDeNaissance')
            ->add('nationalite')
            ->add('photo')
            ->add('statut')
/*            ->add('joursDisponible')*/
            ->add('numero_RCS')
            ->add('numero_securiteSociale')
            ->add('situation')
            ->add('is_available')
            ->add('nom_pere')
            ->add('prenom_pere')
            ->add('nom_mere')
            ->add('prenom_mere')
            ->add('activite_salarie')
            ->add('etablissement_UE')
            ->add('ressortissant_hors_UE')
            ->add('numero_titre_sejour')
            ->add('departement_delivrance')
            ->add('date_expiration_titre_sejour')
            ->add('ville_delivrance')
            ->add('ci')
            ->add('signature')
            ->add('justificatif_domicile')
            ->add('accre')
            ->add('h_PoleEmploi')
            ->add('ABM')
            ->add('NDP')
            ->add('ANC')
            ->add('JPHD')
            ->add('ZUS')
            ->add('tu_es')
            ->add('idUsers')
            ->add('idCertifications')
            ->add('idFormations')
            ->add('idLangages')
            ->add('idLangues')
            ->add('idLogiciels')
            ->add('idPermis')
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

/*            ->add(' info_statutF')*/


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}
