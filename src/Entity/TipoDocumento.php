<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TipoDocumentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=TipoDocumentoRepository::class)
 */
class TipoDocumento
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

    /**
     * @ORM\OneToMany(targetEntity=Victima::class, mappedBy="tipoDocumento")
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

    public function __toString()
    {
        return $this->getDescripcion();
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
            $victima->setTipoDocumento($this);
        }

        return $this;
    }

    public function removeVictima(Victima $victima): self
    {
        if ($this->victimas->removeElement($victima)) {
            // set the owning side to null (unless already changed)
            if ($victima->getTipoDocumento() === $this) {
                $victima->setTipoDocumento(null);
            }
        }

        return $this;
    }
}
