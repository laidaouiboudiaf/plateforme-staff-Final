<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfosBancairesF
 *
 * @ORM\Table(name="infos_bancaires_f", indexes={@ORM\Index(name="fk_BANQUE_FOURNISSEUR", columns={"ID_FOURNISSEUR"})})
 * @ORM\Entity
 */
class InfosBancairesF
{
    /**
     * @var string
     *
     * @ORM\Column(name="Titulaire_Du_compte", type="string", length=255, nullable=false)
     */
    private $titulaireDuCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="IBAN", type="string", length=255, nullable=false)
     */
    private $iban;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_BANCAIRES_F", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBancairesF;

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
    private $SIRET;

    public function getTitulaireDuCompte(): ?string
    {
        return $this->titulaireDuCompte;
    }

    public function setTitulaireDuCompte(string $titulaireDuCompte): self
    {
        $this->titulaireDuCompte = $titulaireDuCompte;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getIdBancairesF(): ?int
    {
        return $this->idBancairesF;
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

    public function getSIRET(): ?int
    {
        return $this->SIRET;
    }

    public function setSIRET(?int $SIRET): self
    {
        $this->SIRET = $SIRET;

        return $this;
    }


}
