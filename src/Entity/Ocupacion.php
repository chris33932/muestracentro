<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OcupacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=OcupacionRepository::class)
 */
class Ocupacion
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
    private $descripcion;

    public function __toString()
    {
        return $this->getDescripcion();
    }

    /**
     * @ORM\OneToMany(targetEntity=Victima::class, mappedBy="ocupacion")
     */
    private $victimas;

    public function __construct()
    {
        $this->victimas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Victima[]
     */
    public function getVictimas(): Collection
    {
        return $this->victimas;
    }

    public function addVictima(Victima $victima): self
    {
        if (!$this->victimas->contains($victima)) {
            $this->victimas[] = $victima;
            $victima->setOcupacion($this);
        }

        return $this;
    }

    public function removeVictima(Victima $victima): self
    {
        if ($this->victimas->removeElement($victima)) {
            // set the owning side to null (unless already changed)
            if ($victima->getOcupacion() === $this) {
                $victima->setOcupacion(null);
            }
        }

        return $this;
    }
}
