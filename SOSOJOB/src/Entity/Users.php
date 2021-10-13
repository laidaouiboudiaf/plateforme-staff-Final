<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 * @ORM\Table(name="users")
 * @ORM\Entity
 * @UniqueEntity(fields={"adresseMail"}, message="Il existe déjà un compte avec cette addresse Email")
 */
class Users implements UserInterface 
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_USERS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsers;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="NUM", type="string", length=255, nullable=false)
     */
    private $num;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE_MAIL", type="string", length=255, nullable=false)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="MOT_DE_PASSE", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="IS_VERIFIED", type="boolean", nullable=true)
     */
    private $isVerified;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CREATED_AT", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="UPDATE_AT", type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    private $username;

    public function getIdUsers(): ?int
    {
        return $this->idUsers;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }
    
    public function setNum(string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /*-------------------------------------------------------------*/

    public function getPassword(): ?string
    {
        return $this->password;
    }
    
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(?bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;

        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function getUsername() {
        
        $username = $this->prenom;
        $username .= " ";
        $username .= $this->nom;

        return $username;
    }

    public function eraseCredentials() {
    }

    public function getSalt() {
    } 

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function __toString()
    {
        return $this->prenom." ".$this->nom;
    
      
    }

}
