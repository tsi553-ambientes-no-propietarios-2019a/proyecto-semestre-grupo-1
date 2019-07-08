<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnidadRepository")
 */
class Unidad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroU;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ruta;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usr", inversedBy="unidad")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroU(): ?string
    {
        return $this->numeroU;
    }

    public function setNumeroU(string $numeroU): self
    {
        $this->numeroU = $numeroU;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    public function setRuta(string $ruta): self
    {
        $this->ruta = $ruta;

        return $this;
    }

    public function getUsr(): ?Usr
    {
        return $this->usr;
    }

    public function setUsr(?Usr $usr): self
    {
        $this->usr = $usr;

        return $this;
    }
}
