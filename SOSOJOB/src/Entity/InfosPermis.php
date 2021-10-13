<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfosPermis
 *
 * @ORM\Table(name="infos_permis")
 * @ORM\Entity
 */
class InfosPermis
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_PERMIS", type="string", length=255, nullable=true)
     */
    private $nomPermis;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_OBTENTION", type="date", nullable=true)
     */
    private $dateObtention;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAYS_OBTENTION", type="string", length=255, nullable=true)
     */
    private $paysObtention;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_PERMIS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPermis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", mappedBy="idPermis")
     */
    private $idFournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Missions", mappedBy="idPermis")
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

    public function getNomPermis(): ?string
    {
        return $this->nomPermis;
    }

    public function setNomPermis(?string $nomPermis): self
    {
        $this->nomPermis = $nomPermis;

        return $this;
    }

    public function getDateObtention(): ?\DateTimeInterface
    {
        return $this->dateObtention;
    }

    public function setDateObtention(?\DateTimeInterface $dateObtention): self
    {
        $this->dateObtention = $dateObtention;

        return $this;
    }

    public function getPaysObtention(): ?string
    {
        return $this->paysObtention;
    }

    public function setPaysObtention(?string $paysObtention): self
    {
        $this->paysObtention = $paysObtention;

        return $this;
    }

    public function getIdPermis(): ?int
    {
        return $this->idPermis;
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
            $idFournisseur->addIdPermi($this);
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        if ($this->idFournisseur->removeElement($idFournisseur)) {
            $idFournisseur->removeIdPermi($this);
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
            $idMission->addIdPermi($this);
        }

        return $this;
    }

    public function removeIdMission(Missions $idMission): self
    {
        if ($this->idMissions->removeElement($idMission)) {
            $idMission->removeIdPermi($this);
        }

        return $this;
    }

}
