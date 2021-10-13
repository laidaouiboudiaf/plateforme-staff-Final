<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MissionsAttr
 *
 * @ORM\Table(name="missions_attr", indexes={@ORM\Index(name="fk_MISSIONS_ATTR_CLIENT", columns={"ID_CLIENT"}), @ORM\Index(name="fk_MISSIONS_ATTR_FOURNISSEUR", columns={"ID_FOURNISSEUR"}), @ORM\Index(name="IDX_B9A3C97F7FFC7018", columns={"ID_MISSIONS_ATTR"})})
 * @ORM\Entity
 */
class MissionsAttr
{
    /**
     * @var \Date
     *
     * @ORM\Column(name="DATE_DEBUT_MISSIONS_RL", type="date", nullable=false)
     * @var string A "Y-m-d" formatted value
     */
    private $dateDebutMissionsRl;


    /**
     * @var \Date|null
     *
     * @ORM\Column(name="DATE_FIN_MISSIONS_RL", type="date", nullable=true)
     * @var string A "Y-m-d" formatted value
     */
    private $dateFinMissionsRl;


    /**
     *
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @var \Missions
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Missions",cascade={"persist", "remove"},mappedBy="idMissions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MISSIONS_ATTR", referencedColumnName="ID_MISSIONS")
     * })
     */
    private $idMissionsAttr;

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
     * @var \Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FOURNISSEUR", referencedColumnName="ID_FOURNISSEUR")
     * })
     */
    private $idFournisseur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_heures;

    /**
     * @return mixed
     */
    public function getNbHeures()
    {
        return $this->nb_heures;
    }


    public function setNbHeures($nb_heures): self
    {
        $this->nb_heures = $nb_heures;
        return $this;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment_Mission_Attr;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valid_nb_heure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant_prestation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chiffre_affaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facture;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $factureF;


    /**
     * @return mixed
     */
    public function getDateDebutMissionsRl()
    {
        return $this->dateDebutMissionsRl;
    }


    public function setDateDebutMissionsRl($dateDebutMissionsRl): self
    {
        $this->dateDebutMissionsRl = $dateDebutMissionsRl;
        return $this;
    }


    public function getDateFinMissionsRl()
    {
        return $this->dateFinMissionsRl;
    }


    public function setDateFinMissionsRl($dateFinMissionsRl): self
    {
        $this->dateFinMissionsRl = $dateFinMissionsRl;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIdMissionsAttr(): ?Missions
    {
        return $this->idMissionsAttr;
    }

    public function setIdMissionsAttr(?Missions $idMissionsAttr): self
    {
        $this->idMissionsAttr = $idMissionsAttr;

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

    public function getIdFournisseur(): ?Fournisseur
    {
        return $this->idFournisseur;
    }

    public function setIdFournisseur(?Fournisseur $idFournisseur): self
    {
        $this->idFournisseur = $idFournisseur;

        return $this;
    }

    public function getCommentMissionAttr(): ?string
    {
        return $this->comment_Mission_Attr;
    }

    public function setCommentMissionAttr(?string $comment_Mission_Attr): self
    {
        $this->comment_Mission_Attr = $comment_Mission_Attr;

        return $this;
    }

    public function getValidNbHeure(): ?bool
    {
        return $this->valid_nb_heure;
    }

    public function setValidNbHeure(bool $valid_nb_heure): self
    {
        $this->valid_nb_heure = $valid_nb_heure;

        return $this;
    }

    public function getMontantPrestation(): ?int
    {
        return $this->montant_prestation;
    }

    public function setMontantPrestation(int $montant_prestation): self
    {
        $this->montant_prestation = $montant_prestation;

        return $this;
    }

    public function getChiffreAffaire(): ?int
    {
        return $this->chiffre_affaire;
    }

    public function setChiffreAffaire(int $chiffre_affaire): self
    {
        $this->chiffre_affaire = $chiffre_affaire;

        return $this;
    }

    public function getFacture(): ?string
    {
        return $this->facture;
    }

    public function setFacture(string $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function getFactureF(): ?string
    {
        return $this->factureF;
    }

    public function setFactureF(string $factureF): self
    {
        $this->factureF = $factureF;

        return $this;
    }


}
