<?php

namespace App\Entity;

use App\Repository\TableauDisponibiliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TableauDisponibiliteRepository::class)
 */
class Tableau_Disponibilite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ID_Tableau_Dispo" , type="integer", nullable=false)
     */
    private $id;
    /**
     * @ORM\Column(name="commentaire_dispo",type="string", nullable=true)
     */
    private $comment_dispo;

    /**
     * @return mixed
     */
    public function getCommentDispo()
    {
        return $this->comment_dispo;
    }

    /**
     * @param mixed $comment_dispo
     */
    public function setCommentDispo($comment_dispo): void
    {
        $this->comment_dispo = $comment_dispo;
    }

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lundi_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lund_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lundi_soir;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mardi_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mardi_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mardi_soir;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mercredi_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mercredi_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mercredi_soir;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $jeudi_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $jeudi_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $jeudi_soir;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vendredi_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vendredi_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vendredi_soir;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $samedi_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $samedi_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $samedi_soir;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dimanche_matin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dimache_midi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dimanche_soir;

    /**
     * @ORM\OneToMany(targetEntity=Fournisseur::class, mappedBy="Tableau_Disoponibilite")
     */
    private $fournisseurs;



    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundiMatin(): ?bool
    {
        return $this->lundi_matin;
    }

    public function setLundiMatin(?bool $lundi_matin): self
    {
        $this->lundi_matin = $lundi_matin;

        return $this;
    }

    public function getLundMidi(): ?bool
    {
        return $this->lund_midi;
    }

    public function setLundMidi(?bool $lund_midi): self
    {
        $this->lund_midi = $lund_midi;

        return $this;
    }

    public function getLundiSoir(): ?bool
    {
        return $this->lundi_soir;
    }

    public function setLundiSoir(?bool $lundi_soir): self
    {
        $this->lundi_soir = $lundi_soir;

        return $this;
    }

    public function getMardiMatin(): ?bool
    {
        return $this->mardi_matin;
    }

    public function setMardiMatin(bool $mardi_matin): self
    {
        $this->mardi_matin = $mardi_matin;

        return $this;
    }

    public function getMardiMidi(): ?bool
    {
        return $this->mardi_midi;
    }

    public function setBoolean(?bool $mardi_midi): self
    {
        $this->mardi_midi= mardi_midi;

        return $this;
    }

    public function getMardiSoir(): ?bool
    {
        return $this->mardi_soir;
    }

    public function setMardiSoir(?bool $mardi_soir): self
    {
        $this->mardi_soir = $mardi_soir;

        return $this;
    }

    public function getMercrediMatin(): ?bool
    {
        return $this->mercredi_matin;
    }

    public function setMercrediMatin(?bool $mercredi_matin): self
    {
        $this->mercredi_matin = $mercredi_matin;

        return $this;
    }

    public function getMercrediMidi(): ?bool
    {
        return $this->mercredi_midi;
    }

    public function setMercrediMidi(?bool $mercredi_midi): self
    {
        $this->mercredi_midi = $mercredi_midi;

        return $this;
    }

    public function getMercrediSoir(): ?bool
    {
        return $this->mercredi_soir;
    }

    public function setMercrediSoir(?bool $mercredi_soir): self
    {
        $this->mercredi_soir = $mercredi_soir;

        return $this;
    }

    public function getJeudiMatin(): ?bool
    {
        return $this->jeudi_matin;
    }

    public function setJeudiMatin(?bool $jeudi_matin): self
    {
        $this->jeudi_matin = $jeudi_matin;

        return $this;
    }

    public function getJeudiMidi(): ?bool
    {
        return $this->jeudi_midi;
    }

    public function setJeudiMidi(?bool $jeudi_midi): self
    {
        $this->jeudi_midi = $jeudi_midi;

        return $this;
    }

    public function getJeudiSoir(): ?bool
    {
        return $this->jeudi_soir;
    }

    public function setJeudiSoir(?bool $jeudi_soir): self
    {
        $this->jeudi_soir = $jeudi_soir;

        return $this;
    }

    public function getVendrediMatin(): ?bool
    {
        return $this->vendredi_matin;
    }

    public function setVendrediMatin(bool $vendredi_matin): self
    {
        $this->vendredi_matin = $vendredi_matin;

        return $this;
    }

    public function getVendrediMidi(): ?bool
    {
        return $this->vendredi_midi;
    }

    public function setVendrediMidi(bool $vendredi_midi): self
    {
        $this->vendredi_midi = $vendredi_midi;

        return $this;
    }

    public function getVendrediSoir(): ?bool
    {
        return $this->vendredi_soir;
    }

    public function setVendrediSoir(?bool $vendredi_soir): self
    {
        $this->vendredi_soir = $vendredi_soir;

        return $this;
    }

    public function getSamediMatin(): ?bool
    {
        return $this->samedi_matin;
    }

    public function setSamediMatin(?bool $samedi_matin): self
    {
        $this->samedi_matin = $samedi_matin;

        return $this;
    }

    public function getSamediMidi(): ?bool
    {
        return $this->samedi_midi;
    }

    public function setSamediMidi(?bool $samedi_midi): self
    {
        $this->samedi_midi = $samedi_midi;

        return $this;
    }

    public function getSamediSoir(): ?bool
    {
        return $this->samedi_soir;
    }

    public function setSamediSoir(?bool $samedi_soir): self
    {
        $this->samedi_soir = $samedi_soir;

        return $this;
    }

    public function getDimancheMatin(): ?bool
    {
        return $this->dimanche_matin;
    }

    public function setDimancheMatin(?bool $dimanche_matin): self
    {
        $this->dimanche_matin = $dimanche_matin;

        return $this;
    }

    public function getDimacheMidi(): ?bool
    {
        return $this->dimache_midi;
    }

    public function setDimacheMidi(?bool $dimache_midi): self
    {
        $this->dimache_midi = $dimache_midi;

        return $this;
    }

    public function getDimancheSoir(): ?bool
    {
        return $this->dimanche_soir;
    }

    public function setDimancheSoir(?bool $dimanche_soir): self
    {
        $this->dimanche_soir = $dimanche_soir;

        return $this;
    }

    /**
     * @return Collection|Fournisseur[]
     */
    public function getFournisseurs(): Collection
    {
        return $this->fournisseurs;
    }

    public function addFournisseur(Fournisseur $fournisseur): self
    {
        if (!$this->fournisseurs->contains($fournisseur)) {
            $this->fournisseurs[] = $fournisseur;
            $fournisseur->setTableauDisoponibilite($this);
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $fournisseur): self
    {
        if ($this->fournisseurs->removeElement($fournisseur)) {
            // set the owning side to null (unless already changed)
            if ($fournisseur->getTableauDisoponibilite() === $this) {
                $fournisseur->setTableauDisoponibilite(null);
            }
        }

        return $this;
    }

    public function setMardiMidi(?bool $mardi_midi): self
    {
        $this->mardi_midi = $mardi_midi;

        return $this;
    }




}
