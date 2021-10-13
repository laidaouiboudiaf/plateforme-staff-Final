<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Lenght;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="fk_CLIENT_USERS", columns={"ID_USERS"})})
 * @ORM\Entity
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CLIENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_ENTREPRISE", type="string", length=255, nullable=false)
     */
    private $nomEntreprise;


    /**
     * @var \Users
     *
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USERS", referencedColumnName="ID_USERS")
     * })
     */
    private $idUsers;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=14,max=14)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_facturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment_client;

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }


    public function getIdUsers(): ?Users
    {
        return $this->idUsers;
    }

    public function setIdUsers(?Users $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(string $adresse_facturation): self
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function __toString()
    {
        return $this->nomEntreprise;

    }


    public function getCommentClient(): ?string
    {
        return $this->comment_client;
    }

    public function setCommentClient(?string $comment_client): self
    {
        $this->comment_client = $comment_client;

        return $this;
    }

}
