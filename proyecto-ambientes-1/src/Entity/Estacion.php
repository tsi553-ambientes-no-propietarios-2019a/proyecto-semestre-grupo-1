<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstacionRepository")
 */
class Estacion
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\Column(type="blob")
     */
    private $imagen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usr", inversedBy="estacion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usr;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Queja", mappedBy="est")
     */
    private $quejas;

    public function __construct()
    {
        $this->quejas = new ArrayCollection();
    }

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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

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

    /**
     * @return Collection|Queja[]
     */
    public function getQuejas(): Collection
    {
        return $this->quejas;
    }

    public function addQueja(Queja $queja): self
    {
        if (!$this->quejas->contains($queja)) {
            $this->quejas[] = $queja;
            $queja->setEst($this);
        }

        return $this;
    }

    public function removeQueja(Queja $queja): self
    {
        if ($this->quejas->contains($queja)) {
            $this->quejas->removeElement($queja);
            // set the owning side to null (unless already changed)
            if ($queja->getEst() === $this) {
                $queja->setEst(null);
            }
        }

        return $this;
    }
}
