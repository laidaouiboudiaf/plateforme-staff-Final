<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfosCertifications
 *
 * @ORM\Table(name="infos_certifications")
 * @ORM\Entity
 */
class InfosCertifications
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_CERTIFICATION", type="string", length=255, nullable=true)
     */
    private $nomCertification;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NIVEAU", type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_OBTENTION_CERTIF", type="date", nullable=true)
     */
    private $dateObtentionCertif;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_CERTIFICATIONS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCertifications;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", mappedBy="idCertifications")
     */
    private $idFournisseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Missions", mappedBy="idCertifications")
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

    public function getNomCertification(): ?string
    {
        return $this->nomCertification;
    }

    public function setNomCertification(?string $nomCertification): self
    {
        $this->nomCertification = $nomCertification;

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

    public function getDateObtentionCertif(): ?\DateTimeInterface
    {
        return $this->dateObtentionCertif;
    }

    public function setDateObtentionCertif(?\DateTimeInterface $dateObtentionCertif): self
    {
        $this->dateObtentionCertif = $dateObtentionCertif;

        return $this;
    }

    public function getIdCertifications(): ?int
    {
        return $this->idCertifications;
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
            $idFournisseur->addIdCertification($this);
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        if ($this->idFournisseur->removeElement($idFournisseur)) {
            $idFournisseur->removeIdCertification($this);
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
            $idMission->addIdCertification($this);
        }

        return $this;
    }

    public function removeIdMission(Missions $idMission): self
    {
        if ($this->idMissions->removeElement($idMission)) {
            $idMission->removeIdCertification($this);
        }

        return $this;
    }
    
    public function __toString()
    {
        return (string)$this->idCertifications;
    }

}
