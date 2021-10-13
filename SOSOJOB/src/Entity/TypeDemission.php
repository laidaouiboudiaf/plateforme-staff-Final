<?php

namespace App\Entity;

use App\Repository\TypeDemissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeDemissionRepository::class)
 */
class TypeDemission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="ID_TYPEDEMISSION",type="integer", nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomTypeMission;

    /**
     * @ORM\ManyToMany(targetEntity=Fournisseur::class, mappedBy="Fournisseur_TypeMission")
     */
    private $TypeDemission_Fournisseur;

    /**
     * @ORM\OneToMany(targetEntity=Missions::class, mappedBy="typeDemission")
     */
    private $relation;



    public function __toString(){
        
       return $this->nomTypeMission;
    }
    

    public function __construct()
    {
        $this->TypeDemission_Fournisseur = new ArrayCollection();
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeMission(): ?string
    {
        return $this->nomTypeMission;
    }

    public function setNomTypeMission(string $nomTypeMission): self
    {
        $this->nomTypeMission = $nomTypeMission;

        return $this;
    }

    /**
     * @return Collection|Fournisseur[]
     */
    public function getTypeDemissionFournisseur(): Collection
    {
        return $this->TypeDemission_Fournisseur;
    }

    public function addTypeDemissionFournisseur(Fournisseur $typeDemissionFournisseur): self
    {
        if (!$this->TypeDemission_Fournisseur->contains($typeDemissionFournisseur)) {
            $this->TypeDemission_Fournisseur[] = $typeDemissionFournisseur;
            $typeDemissionFournisseur->addFournisseurTypeMission($this);
        }

        return $this;
    }

    public function removeTypeDemissionFournisseur(Fournisseur $typeDemissionFournisseur): self
    {
        if ($this->TypeDemission_Fournisseur->removeElement($typeDemissionFournisseur)) {
            $typeDemissionFournisseur->removeFournisseurTypeMission($this);
        }

        return $this;
    }

    /**
     * @return Collection|Missions[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Missions $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setTypeDemission($this);
        }

        return $this;
    }

    public function removeRelation(Missions $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getTypeDemission() === $this) {
                $relation->setTypeDemission(null);
            }
        }

        return $this;
    }







}
