<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfosFormations
 *
 * @ORM\Table(name="infos_formations")
 * @ORM\Entity
 */
class InfosFormations
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_ETABLISSEMENT", type="string", length=255, nullable=true)
     */
    private $nomEtablissement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOMAINE_ETUDES", type="string", length=255, nullable=true)
     */
    private $domaineEtudes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DIPLOME", type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DEBUT", type="date", nullable=true)
     */
    private $debut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FIN", type="date", nullable=true)
     */
    private $fin;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_FORMATIONS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", mappedBy="idFormations")
     */
    private $idFournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Missions", mappedBy="idFormations")
     */
    private $idMissions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idFournisseur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idMissions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getNomEtablissement(): ?string
    {
        return $this->nomEtablissement;
    }

    public function setNomEtablissement(?string $nomEtablissement): self
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    public function getDomaineEtudes(): ?string
    {
        return $this->domaineEtudes;
    }

    public function setDomaineEtudes(?string $domaineEtudes): self
    {
        $this->domaineEtudes = $domaineEtudes;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(?\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getIdFormations(): ?int
    {
        return $this->idFormations;
    }

    /**
     * @return Collection|Fournisseur[]
     */
    public function getIdFournisseur(): Collection
    {
        return $this->idFournisseur;
    }

    public function addIdFournisseur(Fournisseur $idFournisseur): self
    {
        if (!$this->idFournisseur->contains($idFournisseur)) {
            $this->idFournisseur[] = $idFournisseur;
            $idFournisseur->addIdFormation($this);
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        if ($this->idFournisseur->removeElement($idFournisseur)) {
            $idFournisseur->removeIdFormation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Missions[]
     */
    public function getIdMissions(): Collection
    {
        return $this->idMissions;
    }

    public function addIdMission(Missions $idMission): self
    {
        if (!$this->idMissions->contains($idMission)) {
            $this->idMissions[] = $idMission;
            $idMission->addIdFormation($this);
        }

        return $this;
    }

    public function removeIdMission(Missions $idMission): self
    {
        if ($this->idMissions->removeElement($idMission)) {
            $idMission->removeIdFormation($this);
        }

        return $this;
    }

}
