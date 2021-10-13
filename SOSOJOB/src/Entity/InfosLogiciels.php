<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfosLogiciels
 *
 * @ORM\Table(name="infos_logiciels")
 * @ORM\Entity
 */
class InfosLogiciels
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_LOGICIEL", type="string", length=255, nullable=true)
     */
    private $nomLogiciel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NIVEAU", type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_LOGICIELS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogiciels;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", mappedBy="idLogiciels")
     */
    private $idFournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Missions", mappedBy="idLogiciels")
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

    public function getNomLogiciel(): ?string
    {
        return $this->nomLogiciel;
    }

    public function setNomLogiciel(?string $nomLogiciel): self
    {
        $this->nomLogiciel = $nomLogiciel;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdLogiciels(): ?int
    {
        return $this->idLogiciels;
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
            $idFournisseur->addIdLogiciel($this);
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        if ($this->idFournisseur->removeElement($idFournisseur)) {
            $idFournisseur->removeIdLogiciel($this);
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
            $idMission->addIdLogiciel($this);
        }

        return $this;
    }

    public function removeIdMission(Missions $idMission): self
    {
        if ($this->idMissions->removeElement($idMission)) {
            $idMission->removeIdLogiciel($this);
        }

        return $this;
    }

}
