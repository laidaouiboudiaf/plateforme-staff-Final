<?php

namespace App\Entity;

use App\Repository\PermisTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PermisTypeRepository::class)
 */
class PermisType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypePermis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypePermis(): ?string
    {
        return $this->TypePermis;
    }

    public function setTypePermis(string $TypePermis): self
    {
        $this->TypePermis = $TypePermis;

        return $this;
    }
    public function __toString(){

        return $this->TypePermis;
    }
}
