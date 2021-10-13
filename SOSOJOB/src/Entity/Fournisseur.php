<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Lenght;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur", indexes={@ORM\Index(name="fk_FOURNISSEUR_USERS", columns={"ID_USERS"})})
 * @ORM\Entity
 */
class Fournisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FOURNISSEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE_F", type="string", length=255, nullable=true)
     */
    private $adresseF;

    /**
     * @var string
     *
     * @ORM\Column(name="GENRE", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="LIEU_DE_NAISSANCE", type="string", length=255, nullable=true)
     */
    private $lieuDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="NATIONALITE", type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="PHOTO", type="string", length=65535, nullable=true)
     */
    private $photo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STATUT", type="string", length=255, nullable=true)
     */
    private $statut;



    /**
     * @var \Users
     *
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USERS", referencedColumnName="ID_USERS")
     * })
     */
    private $idUsers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosCertifications", inversedBy="idFournisseur")
     * @ORM\JoinTable(name="fournisseur_certifications",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_CERTIFICATIONS", referencedColumnName="ID_CERTIFICATIONS")
     *   }
     * )
     */
    private $idCertifications;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosFormations", inversedBy="idFournisseur")
     * @ORM\JoinTable(name="fournisseur_formations",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_FORMATIONS", referencedColumnName="ID_FORMATIONS")
     *   }
     * )
     */
    private $idFormations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosLangages", inversedBy="idFournisseur")
     * @ORM\JoinTable(name="fournisseur_langages",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_LANGAGES", referencedColumnName="ID_LANGAGES")
     *   }
     * )
     */
    private $idLangages;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosLangues", inversedBy="idFournisseur")
     * @ORM\JoinTable(name="fournisseur_langues",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_LANGUES", referencedColumnName="ID_LANGUES")
     *   }
     * )
     */
    private $idLangues;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosLogiciels", inversedBy="idFournisseur")
     * @ORM\JoinTable(name="fournisseur_logiciels",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_LOGICIELS", referencedColumnName="ID_LOGICIELS")
     *   }
     * )
     */
    private $idLogiciels;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosPermis", inversedBy="idFournisseur")
     * @ORM\JoinTable(name="fournisseur_permis",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_PERMIS", referencedColumnName="ID_PERMIS")
     *   }
     * )
     */
    private $idPermis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\ManyToMany(targetEntity=TypeDemission::class, inversedBy="TypeDemission_Fournisseur")
     * @ORM\JoinTable(name="fournisseur_typedemission",
     * joinColumns={
     *  @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     *  },
     *  inverseJoinColumns={
     *   @ORM\JoinColumn(name="ID_TYPEDEMISSION", referencedColumnName="ID_TYPEDEMISSION")
     * }
     * )
     */
    private $Fournisseur_TypeMission;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=14,max=14)
     */
    private $numero_RCS;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $numero_securiteSociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situation;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $is_available;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_pere;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $prenom_pere;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $nom_mere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom_mere;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activite_salarie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etablissement_UE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ressortissant_hors_UE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero_titre_sejour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $departement_delivrance;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_expiration_titre_sejour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville_delivrance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ci;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $signature;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $justificatif_domicile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $h_PoleEmploi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ABM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NDP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ANC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $JPHD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ZUS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tu_es;

    /**
     * @ORM\ManyToOne(targetEntity=Tableau_Disponibilite::class, inversedBy="fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Tableau_Dispo", referencedColumnName="ID_Tableau_Dispo")
     * })
     */

    private $Tableau_Disoponibilite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $info_statutF;

    /**
     * @ORM\Column(type="string", length=65335, nullable=true)
     */
    private $permis;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCertifications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idFormations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLangages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLangues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLogiciels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idPermis = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Fournisseur_TypeMission = new ArrayCollection();


       
    }

    public function getIdFournisseur(): ?int
    {
        return $this->idFournisseur;
    }

    public function getAdresseF(): ?string
    {
        return $this->adresseF;
    }

    public function setAdresseF(string $adresseF): self
    {
        $this->adresseF = $adresseF;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieuDeNaissance;
    }

    public function setLieuDeNaissance(string $lieuDeNaissance): self
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

   

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }




    public function getIdUsers(): ?Users
    {
        return $this->idUsers;
    }

    public function setIdUsers(?Users $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    /**
     * @return Collection|InfosCertifications[]
     */
    public function getIdCertifications(): Collection
    {
        return $this->idCertifications;
    }

    public function addIdCertification(InfosCertifications $idCertification): self
    {
        if (!$this->idCertifications->contains($idCertification)) {
            $this->idCertifications[] = $idCertification;
        }

        return $this;
    }

    public function removeIdCertification(InfosCertifications $idCertification): self
    {
        $this->idCertifications->removeElement($idCertification);

        return $this;
    }

    /**
     * @return Collection|InfosFormations[]
     */
    public function getIdFormations(): Collection
    {
        return $this->idFormations;
    }

    public function addIdFormation(InfosFormations $idFormation): self
    {
        if (!$this->idFormations->contains($idFormation)) {
            $this->idFormations[] = $idFormation;
        }

        return $this;
    }

    public function removeIdFormation(InfosFormations $idFormation): self
    {
        $this->idFormations->removeElement($idFormation);

        return $this;
    }

    /**
     * @return Collection|InfosLangages[]
     */
    public function getIdLangages(): Collection
    {
        return $this->idLangages;
    }

    public function addIdLangage(InfosLangages $idLangage): self
    {
        if (!$this->idLangages->contains($idLangage)) {
            $this->idLangages[] = $idLangage;
        }

        return $this;
    }

    public function removeIdLangage(InfosLangages $idLangage): self
    {
        $this->idLangages->removeElement($idLangage);

        return $this;
    }

    /**
     * @return Collection|InfosLangues[]
     */
    public function getIdLangues(): Collection
    {
        return $this->idLangues;
    }

    public function addIdLangue(InfosLangues $idLangue): self
    {
        if (!$this->idLangues->contains($idLangue)) {
            $this->idLangues[] = $idLangue;
        }

        return $this;
    }

    public function removeIdLangue(InfosLangues $idLangue): self
    {
        $this->idLangues->removeElement($idLangue);

        return $this;
    }

    /**
     * @return Collection|InfosLogiciels[]
     */
    public function getIdLogiciels(): Collection
    {
        return $this->idLogiciels;
    }

    public function addIdLogiciel(InfosLogiciels $idLogiciel): self
    {
        if (!$this->idLogiciels->contains($idLogiciel)) {
            $this->idLogiciels[] = $idLogiciel;
        }

        return $this;
    }

    public function removeIdLogiciel(InfosLogiciels $idLogiciel): self
    {
        $this->idLogiciels->removeElement($idLogiciel);

        return $this;
    }

    /**
     * @return Collection|InfosPermis[]
     */
    public function getIdPermis(): Collection
    {
        return $this->idPermis;
    }

    public function addIdPermi(InfosPermis $idPermi): self
    {
        if (!$this->idPermis->contains($idPermi)) {
            $this->idPermis[] = $idPermi;
        }

        return $this;
    }

    public function removeIdPermi(InfosPermis $idPermi): self
    {
        $this->idPermis->removeElement($idPermi);

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection|TypeDemission[]
     */
    public function getFournisseurTypeMission(): Collection
    {
        return $this->Fournisseur_TypeMission;
    }

    public function addFournisseurTypeMission(TypeDemission $fournisseurTypeMission): self
    {
        if (!$this->Fournisseur_TypeMission->contains($fournisseurTypeMission)) {
            $this->Fournisseur_TypeMission[] = $fournisseurTypeMission;
        }

        return $this;
    }

    public function removeFournisseurTypeMission(TypeDemission $fournisseurTypeMission): self
    {
        $this->Fournisseur_TypeMission->removeElement($fournisseurTypeMission);

        return $this;
    }

    public function getNumeroRCS(): ?string
    {
        return $this->numero_RCS;
    }

    public function setNumeroRCS(?string $numero_RCS): self
    {
        $this->numero_RCS = $numero_RCS;

        return $this;
    }

    public function getNumeroSecuriteSociale(): ?int
    {
        return $this->numero_securiteSociale;
    }

    public function setNumeroSecuriteSociale(int $numero_securiteSociale): self
    {
        $this->numero_securiteSociale = $numero_securiteSociale;

        return $this;
    }

    public function getSituation(): ?bool
    {
        return $this->situation;
    }

    public function setSituation(bool $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->is_available;
    }

    public function setIsAvailable(bool $is_available): self
    {
        $this->is_available = $is_available;

        return $this;
    }

    public function getNomPere(): ?string
    {
        return $this->nom_pere;
    }

    public function setNomPere(?string $nom_pere): self
    {
        $this->nom_pere = $nom_pere;

        return $this;
    }

    public function getPrenomPere(): ?string
    {
        return $this->prenom_pere;
    }

    public function setPrenomPere(string $prenom_pere): self
    {
        $this->prenom_pere = $prenom_pere;

        return $this;
    }

    public function getNomMere(): ?string
    {
        return $this->nom_mere;
    }

    public function setNomMere(string $nom_mere): self
    {
        $this->nom_mere = $nom_mere;

        return $this;
    }

    public function getPrenomMere(): ?string
    {
        return $this->prenom_mere;
    }

    public function setPrenomMere(?string $prenom_mere): self
    {
        $this->prenom_mere = $prenom_mere;

        return $this;
    }

    
    public function getActiviteSalarie(): ?string
    {
        return $this->activite_salarie;
    }

    public function setActiviteSalarie(?string $activite_salarie): self
    {
        $this->activite_salarie = $activite_salarie;

        return $this;
    }

    public function getEtablissementUE(): ?string
    {
        return $this->etablissement_UE;
    }

    public function setEtablissementUE(?string $etablissement_UE): self
    {
        $this->etablissement_UE = $etablissement_UE;

        return $this;
    }

    public function getRessortissantHorsUE(): ?string
    {
        return $this->ressortissant_hors_UE;
    }

    public function setRessortissantHorsUE(?string $ressortissant_hors_UE): self
    {
        $this->ressortissant_hors_UE = $ressortissant_hors_UE;

        return $this;
    }

    public function getNumeroTitreSejour(): ?string
    {
        return $this->numero_titre_sejour;
    }

    public function setNumeroTitreSejour(?string $nuemro_titre_sejour): self
    {
        $this->numero_titre_sejour = $nuemro_titre_sejour;

        return $this;
    }

    public function getDepartementDelivrance(): ?string
    {
        return $this->departement_delivrance;
    }

    public function setDepartementDelivrance(?string $departement_delivrance): self
    {
        $this->departement_delivrance = $departement_delivrance;

        return $this;
    }

    public function getDateExpirationTitreSejour(): ?\DateTimeInterface
    {
        return $this->date_expiration_titre_sejour;
    }

    public function setDateExpirationTitreSejour(?\DateTimeInterface $date_expiratation_titre_sejour): self
    {
        $this->date_expiratation_titre_sejour = $date_expiratation_titre_sejour;

        return $this;
    }

    public function getVilleDelivrance(): ?string
    {
        return $this->ville_delivrance;
    }

    public function setVilleDelivrance(?string $ville_delivrance): self
    {
        $this->ville_delivrance = $ville_delivrance;

        return $this;
    }

    public function getCi(): ?string
    {
        return $this->ci;
    }

    public function setCi(?string $ci): self
    {
        $this->ci = $ci;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }

    public function getJustificatifDomicile(): ?string
    {
        return $this->justificatif_domicile;
    }

    public function setJustificatifDomicile(?string $justificatif_domicile): self
    {
        $this->justificatif_domicile = $justificatif_domicile;

        return $this;
    }

    public function getAccre(): ?string
    {
        return $this->accre;
    }

    public function setAccre(?string $accre): self
    {
        $this->accre = $accre;

        return $this;
    }

    public function getHPoleEmploi(): ?string
    {
        return $this->h_PoleEmploi;
    }

    public function setHPoleEmploi(?string $h_PoleEmploi): self
    {
        $this->h_PoleEmploi = $h_PoleEmploi;

        return $this;
    }

    public function getABM(): ?string
    {
        return $this->ABM;
    }

    public function setABM(?string $ABM): self
    {
        $this->ABM = $ABM;

        return $this;
    }

    public function getNDP(): ?string
    {
        return $this->NDP;
    }

    public function setNDP(?string $NDP): self
    {
        $this->NDP = $NDP;

        return $this;
    }

    public function getANC(): ?string
    {
        return $this->ANC;
    }

    public function setANC(?string $ANC): self
    {
        $this->ANC = $ANC;

        return $this;
    }

    public function getJPHD(): ?string
    {
        return $this->JPHD;
    }

    public function setJPHD(?string $JPHD): self
    {
        $this->JPHD = $JPHD;

        return $this;
    }

    public function getZUS(): ?string
    {
        return $this->ZUS;
    }

    public function setZUS(?string $ZUS): self
    {
        $this->ZUS = $ZUS;

        return $this;
    }

    public function getTuEs(): ?string
    {
        return $this->tu_es;
    }

    public function setTuEs(?string $tu_es): self
    {
        $this->tu_es = $tu_es;


        return $this;
    }

    public function getTableauDisoponibilite(): ?Tableau_Disponibilite
    {
        return $this->Tableau_Disoponibilite;
    }

    public function setTableauDisoponibilite(?Tableau_Disponibilite $Tableau_Disoponibilite): self
    {
        $this->Tableau_Disoponibilite = $Tableau_Disoponibilite;

        return $this;
    }

    public function getInfoStatutF(): ?string
    {
        return $this->info_statutF;
    }

    public function setInfoStatutF(?string $info_statutF): self
    {
        $this->info_statutF = $info_statutF;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->idFournisseur;

    }

    public function getPermis(): ?string
    {
        return $this->permis;
    }

    public function setPermis(?string $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

}
