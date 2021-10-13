<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfosLangues
 *
 * @ORM\Table(name="infos_langues")
 * @ORM\Entity
 */
class InfosLangues
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_LANGUE", type="string", length=255, nullable=true)
     */
    private $nomLangue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NIVEAU", type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_LANGUES", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLangues;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", mappedBy="idLangues")
     */
    private $idFournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Missions", mappedBy="idLangues")
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

    public function getNomLangue(): ?string
    {
        return $this->nomLangue;
    }

    public function setNomLangue(?string $nomLangue): self
    {
        $this->nomLangue = $nomLangue;

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

    public function getIdLangues(): ?int
    {
        return $this->idLangues;
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
            $idFournisseur->addIdLangue($this);
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        if ($this->idFournisseur->removeElement($idFournisseur)) {
            $idFournisseur->removeIdLangue($this);
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
            $idMission->addIdLangue($this);
        }

        return $this;
    }

    public function removeIdMission(Missions $idMission): self
    {
        if ($this->idMissions->removeElement($idMission)) {
            $idMission->removeIdLangue($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nomLangue." ".$this->niveau;
    
      
    }
}
