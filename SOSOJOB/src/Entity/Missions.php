<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints\Lenght;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Missions
 *
 * @ORM\Table(name="missions", indexes={@ORM\Index(name="fk_CLIENT_MISSIONS", columns={"ID_CLIENT"})})
 * @ORM\Entity
 */
class Missions
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_MISSIONS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMissions;

    /**
     * @return int
     */
    public function getIdMissions(): ?int
    {
        return $this->idMissions;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="OBJET_MISSIONS", type="string", length=255, nullable=false)
     */
    private $objetMissions;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION_MISSIONS", type="text", length=255, nullable=false)
     */
    private $descriptionMissions;




    /**
     * @var int
     * @Assert\Positive
     *
     * @ORM\Column(name="nombres_jobbers_souhaite", type="integer", nullable=false)
     */
    private $nombreJobber;


    /**
     * @var \Date
     * @var string A "Y-m-d" formatted value
     * @ORM\Column(name="DATE_DEBUT_MISSIONS_PR", type="date", nullable=false)
     */
    private $dateDebutMissionsPr;

    /**
     * @var \Date
     * @var string A "Y-m-d" formatted value
     * @ORM\Column(name="DATE_FIN_MISSIONS_PR", type="date", nullable=false)
     */
    private $dateFinMissionsPr;

    /**
     * @var \Time|null
     *
     * @ORM\Column(name="HORAIRE_MISSIONS", type="time", nullable=true)
     */
    private $horaireMissions;

    /**
     * @var Time|null
     *
     * @ORM\Column(name="TEMPS_PAUSE", type="time", nullable=true)
     */
    private $tempsPause;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="PAUSE_REMUNERE", type="boolean", nullable=true)
     */
    private $pauseRemunere;


    /**
     * @var string|null
     *
     * @ORM\Column (name="nom_contact",type="string",length=255,nullable=false)
     */
    private $nomContact;

    /**
     * @var string|null
     * @ORM\Column (name="prenom_contact",type="string",length=255,nullable=false)
     */
    private $prenomContact;


    /**
     *
     * @ORM\Column(name="tel_contact", type="string", length=255,nullable=false)
     */
    private $telContact;


    /**
     *
     * @var string|null
     * @ORM\Column(name="informations_suplementaires", type="string",nullable=true)
     */
    private $infoSuplementaires;


    /**
     * @var string|null
     * @ORM\Column(name="details_supplementaires", type="string", nullable=true)
     */
    private $detailSuplimentaire;



    /**
     * @var string|null
     *
     * @ORM\Column(name="email_contact", type="string", length=255, nullable=false)
     */
    private $emailContact;


    /**
     * @var string|null
     *
     * @ORM\Column(name="EQUIPEMENT", type="string", length=255, nullable=true)
     */
    private $equipement;

    /**
     * @var string
     *
     * @ORM\Column(name="ETAT", type="string", length=5, nullable=true)
     */
    private $etat;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLIENT", referencedColumnName="ID_CLIENT")
     * })
     */
    private $idClient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="InfosCertifications", inversedBy="idMissions")
     * @ORM\JoinTable(name="missions_certifications",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MISSIONS", referencedColumnName="ID_MISSIONS")
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
     * @ORM\ManyToMany(targetEntity="InfosFormations", inversedBy="idMissions")
     * @ORM\JoinTable(name="missions_formations",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MISSIONS", referencedColumnName="ID_MISSIONS")
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
     * @ORM\ManyToMany(targetEntity="InfosLangages", inversedBy="idMissions")
     * @ORM\JoinTable(name="missions_langages",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MISSIONS", referencedColumnName="ID_MISSIONS")
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
     * @ORM\ManyToMany(targetEntity="InfosLangues", inversedBy="idMissions")
     * @ORM\JoinTable(name="missions_langues",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MISSIONS", referencedColumnName="ID_MISSIONS")
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
     * @ORM\ManyToMany(targetEntity="InfosLogiciels", inversedBy="idMissions")
     * @ORM\JoinTable(name="missions_logiciels",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MISSIONS", referencedColumnName="ID_MISSIONS")
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
     * @ORM\ManyToMany(targetEntity="InfosPermis", inversedBy="idMissions")
     * @ORM\JoinTable(name="missions_permis",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MISSIONS", referencedColumnName="ID_MISSIONS")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_PERMIS", referencedColumnName="ID_PERMIS")
     *   }
     * )
     */
    private $idPermis;


    /**
     * @ORM\Column(name="adresse_contact",type="string", length=255, nullable=false)
     */
    private $Adresse_contact;

    /**
     * @return mixed
     */
    public function getAdresseContact()
    {
        return $this->Adresse_contact;
    }

    /**
     * @param mixed $Adresse_contact
     * @return Missions
     */
    public function setAdresseContact($Adresse_contact)
    {
        $this->Adresse_contact = $Adresse_contact;
        return $this;
    }

    /**
     *
     * @ORM\Column(type="time")
     */
    private $heures_Debut_Missions;

    /**
     * @ORM\Column(type="time")
     */
    private $heures_Fin_Missions;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heures_Debut_Pause;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heure_Fin_Pause;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $permis_Mission;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Categorie_Autre;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDemission::class, inversedBy="relation")
     *  @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TYPEDEMISSION", referencedColumnName="ID_TYPEDEMISSION")
     * })
     */
    private $typeDemission;




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
    }


    public function getObjetMissions(): ?string
    {
        return $this->objetMissions;
    }

    public function getNombreJobber(): ?int
    {
        return $this->nombreJobber;
    }


    public function setNombreJobber(int $nombreJobber): self
    {
        $this->nombreJobber = $nombreJobber;
        return $this;
    }


    public function setObjetMissions(string $objetMissions): self
    {
        $this->objetMissions = $objetMissions;

        return $this;
    }

    public function getDescriptionMissions(): ?string
    {
        return $this->descriptionMissions;
    }

    public function setDescriptionMissions(string $descriptionMissions): self
    {
        $this->descriptionMissions = $descriptionMissions;

        return $this;
    }


    public function getDateDebutMissionsPr(): ?\DateTimeInterface
    {
        return $this->dateDebutMissionsPr;
    }

    public function setDateDebutMissionsPr(\DateTimeInterface $dateDebutMissionsPr): self
    {
        $this->dateDebutMissionsPr = $dateDebutMissionsPr;

        return $this;
    }

    public function getDateFinMissionsPr(): ?\DateTimeInterface
    {
        return $this->dateFinMissionsPr;
    }

    public function setDateFinMissionsPr(\DateTimeInterface $dateFinMissionsPr): self
    {
        $this->dateFinMissionsPr = $dateFinMissionsPr;

        return $this;
    }

    public function getHoraireMissions(): ?\DateTimeInterface
    {
        return $this->horaireMissions;
    }

    public function setHoraireMissions(?\DateTimeInterface $horaireMissions): self
    {
        $this->horaireMissions = $horaireMissions;

        return $this;
    }

    public function getTempsPause(): ?\DateTimeInterface
    {
        return $this->tempsPause;
    }

    public function setTempsPause(?\DateTimeInterface $tempsPause): self
    {
        $this->tempsPause = $tempsPause;

        return $this;
    }

    public function getPauseRemunere(): ?bool
    {
        return $this->pauseRemunere;
    }

    public function setPauseRemunere(?bool $pauseRemunere): self
    {
        $this->pauseRemunere = $pauseRemunere;

        return $this;
    }


    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }


    public function setNomContact(?string $nomContact): self
    {
        $this->nomContact = $nomContact;
        return $this;
    }


    public function getInfoSuplementaires(): ?string
    {
        return $this->infoSuplementaires;
    }


    public function setInfoSuplementaires(?string $infoSuplementaires): self
    {
        $this->infoSuplementaires = $infoSuplementaires;
        return $this;
    }


    public function getTelContact(): string
    {
        return $this->telContact;
    }


    public function setTelContact(string $telContact): self
    {
        $this->telContact = $telContact;
        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;
        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }


    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;
        return $this;

    }

    public function getDetailSuplimentaire(): ?string
    {
        return $this->detailSuplimentaire;
    }


    public function setDetailSuplimentaire(?string $detailSuplimentaire): self
    {
        $this->detailSuplimentaire = $detailSuplimentaire;
        return $this;
    }

    public function getVehicule(): ?string
    {
        return $this->vehicule;
    }

    public function setVehicule(?string $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getEquipement(): ?string
    {
        return $this->equipement;
    }

    public function setEquipement(?string $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
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


    public function __toString()
    {
        return (string)$this->idMissions;;


    }


    public function getHeuresDebutMissions(): ?\DateTimeInterface
    {
        return $this->heures_Debut_Missions;
    }

    public function setHeuresDebutMissions(\DateTimeInterface $heures_Debut_Missions): self
    {
        $this->heures_Debut_Missions = $heures_Debut_Missions;

        return $this;
    }

    public function getHeuresFinMissions(): ?\DateTimeInterface
    {
        return $this->heures_Fin_Missions;
    }

    public function setHeuresFinMissions(\DateTimeInterface $heures_Fin_Missions): self
    {
        $this->heures_Fin_Missions = $heures_Fin_Missions;

        return $this;
    }

    public function getHeuresDebutPause(): ?\DateTimeInterface
    {
        return $this->heures_Debut_Pause;
    }

    public function setHeuresDebutPause(?\DateTimeInterface $heures_Debut_Pause): self
    {
        $this->heures_Debut_Pause = $heures_Debut_Pause;

        return $this;
    }

    public function getHeureFinPause(): ?\DateTimeInterface
    {
        return $this->heure_Fin_Pause;
    }

    public function setHeureFinPause(?\DateTimeInterface $heure_Fin_Pause): self
    {
        $this->heure_Fin_Pause = $heure_Fin_Pause;

        return $this;
    }

    public function getPermisMission(): ?string
    {
        return $this->permis_Mission;
    }

    public function setPermisMission(string $permis_Mission): self
    {
        $this->permis_Mission = $permis_Mission;

        return $this;
    }

    public function getCategorieAutre(): ?string
    {
        return $this->Categorie_Autre;
    }

    public function setCategorieAutre(string $Categorie_Autre): self
    {
        $this->Categorie_Autre = $Categorie_Autre;



        return $this;
    }

    public function getTypeDemission(): ?TypeDemission
    {
        return $this->typeDemission;
    }

    public function setTypeDemission(?TypeDemission $typeDemission): self
    {
        $this->typeDemission = $typeDemission;

        return $this;
    }






}
