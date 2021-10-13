<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfosBancairesC
 *
 * @ORM\Table(name="infos_bancaires_c", indexes={@ORM\Index(name="fk_BANQUE_CLIENT", columns={"ID_CLIENT"})})
 * @ORM\Entity
 */
class InfosBancairesC
{
    /**
     * @var string
     *
     * @ORM\Column(name="Titulaire_du_compte", type="string", length=255, nullable=false)
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
     * @ORM\Column(name="ID_BANCAIRES_C", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBancairesC;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLIENT", referencedColumnName="ID_CLIENT")
     * })
     */
    private $idClient;

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

    public function getIdBancairesC(): ?int
    {
        return $this->idBancairesC;
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


}
