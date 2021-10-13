<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfosLangages
 *
 * @ORM\Table(name="infos_langages")
 * @ORM\Entity(repositoryClass=App\Repository\LangagesRepository::class)
 */
class InfosLangages
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_LANGAGE", type="string", length=255, nullable=true)
     */
    private $nomLangage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NIVEAU", type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_LANGAGES", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLangages;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", mappedBy="idLangages")
     */
    private $idFournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Missions", mappedBy="idLangages")
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

    public function getNomLangage(): ?string
    {
        return $this->nomLangage;
    }

    public function setNomLangage(?string $nomLangage): self
    {
        $this->nomLangage = $nomLangage;

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

    public function getIdLangages(): ?int
    {
        return $this->idLangages;
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
            $idFournisseur->addIdLangage($this);
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        if ($this->idFournisseur->removeElement($idFournisseur)) {
            $idFournisseur->removeIdLangage($this);
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
            $idMission->addIdLangage($this);
        }

        return $this;
    }

    public function removeIdMission(Missions $idMission): self
    {
        if ($this->idMissions->removeElement($idMission)) {
            $idMission->removeIdLangage($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nomLangage." ".$this->niveau;
    
      
    }

}
