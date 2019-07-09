<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstadoRepository")
 */
class Estado
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
    private $idestado;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Queja", mappedBy="estado")
     */
    private $que;

    public function __construct()
    {
        $this->que = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdestado(): ?int
    {
        return $this->idestado;
    }

    public function setIdestado(int $idestado): self
    {
        $this->idestado = $idestado;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Queja[]
     */
    public function getQue(): Collection
    {
        return $this->que;
    }

    public function addQue(Queja $que): self
    {
        if (!$this->que->contains($que)) {
            $this->que[] = $que;
            $que->setEstado($this);
        }

        return $this;
    }

    public function removeQue(Queja $que): self
    {
        if ($this->que->contains($que)) {
            $this->que->removeElement($que);
            // set the owning side to null (unless already changed)
            if ($que->getEstado() === $this) {
                $que->setEstado(null);
            }
        }

        return $this;
    }
}
