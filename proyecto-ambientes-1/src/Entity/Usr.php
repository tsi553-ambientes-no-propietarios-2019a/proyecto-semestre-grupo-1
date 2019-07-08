<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsrRepository")
 */
class Usr
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $CI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Estacion", mappedBy="usr")
     */
    private $estacion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unidad", mappedBy="usr")
     */
    private $unidad;

    public function __construct()
    {
        $this->estacion = new ArrayCollection();
        $this->unidad = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCI(): ?int
    {
        return $this->CI;
    }

    public function setCI(int $CI): self
    {
        $this->CI = $CI;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|estacion[]
     */
    public function getEstacion(): Collection
    {
        return $this->estacion;
    }

    public function addEstacion(estacion $estacion): self
    {
        if (!$this->estacion->contains($estacion)) {
            $this->estacion[] = $estacion;
            $estacion->setUsr($this);
        }

        return $this;
    }

    public function removeEstacion(estacion $estacion): self
    {
        if ($this->estacion->contains($estacion)) {
            $this->estacion->removeElement($estacion);
            // set the owning side to null (unless already changed)
            if ($estacion->getUsr() === $this) {
                $estacion->setUsr(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|unidad[]
     */
    public function getUnidad(): Collection
    {
        return $this->unidad;
    }

    public function addUnidad(unidad $unidad): self
    {
        if (!$this->unidad->contains($unidad)) {
            $this->unidad[] = $unidad;
            $unidad->setUsr($this);
        }

        return $this;
    }

    public function removeUnidad(unidad $unidad): self
    {
        if ($this->unidad->contains($unidad)) {
            $this->unidad->removeElement($unidad);
            // set the owning side to null (unless already changed)
            if ($unidad->getUsr() === $this) {
                $unidad->setUsr(null);
            }
        }

        return $this;
    }
}
