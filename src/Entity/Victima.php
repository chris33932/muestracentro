<?php

namespace App\Entity;

use App\Repository\VictimaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VictimaRepository::class)
 */
class Victima
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
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

     /**
     * @ORM\ManyToOne(targetEntity=TipoDocumento::class, inversedBy="victimas")
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nro_documento;

    /**
     * @ORM\ManyToOne(targetEntity=Sexo::class, inversedBy="victimas")
     */
    private $sexo;

    /**
     * @ORM\ManyToOne(targetEntity=Ocupacion::class, inversedBy="victimas")
     */
    private $ocupacion;

    /**
     * @ORM\ManyToOne(targetEntity=Genero::class, inversedBy="victimas")
     */
    private $genero;

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getTipoDocumento(): ?TipoDocumento
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?TipoDocumento $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getNroDocumento(): ?string
    {
        return $this->nro_documento;
    }

    public function setNroDocumento(string $nro_documento): self
    {
        $this->nro_documento = $nro_documento;

        return $this;
    }

    public function getSexo(): ?Sexo
    {
        return $this->sexo;
    }

    public function setSexo(?Sexo $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getOcupacion(): ?Ocupacion
    {
        return $this->ocupacion;
    }

    public function setOcupacion(?Ocupacion $ocupacion): self
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    public function setGenero(?Genero $genero): self
    {
        $this->genero = $genero;

        return $this;
    }
}
