<?php

namespace App\Entity;

use App\Repository\ComisariaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComisariaRepository::class)
 */
class Comisaria
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $calle;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $altura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(?string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getAltura(): ?string
    {
        return $this->altura;
    }

    public function setAltura(?string $altura): self
    {
        $this->altura = $altura;

        return $this;
    }
}
