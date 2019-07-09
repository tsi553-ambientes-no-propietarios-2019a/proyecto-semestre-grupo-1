<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuejaRepository")
 */
class Queja
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
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechahora;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estacion", inversedBy="quejas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $est;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estado", inversedBy="que")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estado;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechahora(): ?\DateTimeInterface
    {
        return $this->fechahora;
    }

    public function setFechahora(\DateTimeInterface $fechahora): self
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    public function getEst(): ?Estacion
    {
        return $this->est;
    }

    public function setEst(?Estacion $est): self
    {
        $this->est = $est;

        return $this;
    }

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}
