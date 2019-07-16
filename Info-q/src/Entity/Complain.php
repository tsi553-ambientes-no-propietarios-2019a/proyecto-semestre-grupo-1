<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComplainRepository")
 */
class Complain
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
    private $id_com;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="complains")
     */
    private $id_admin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usr", inversedBy="complains")
     */
    private $ci_usr;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unit", mappedBy="complain")
     */
    private $number_uni;

    public function __construct()
    {
        $this->number_uni = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCom(): ?int
    {
        return $this->id_com;
    }

    public function setIdCom(int $id_com): self
    {
        $this->id_com = $id_com;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdAdmin(): ?User
    {
        return $this->id_admin;
    }

    public function setIdAdmin(?User $id_admin): self
    {
        $this->id_admin = $id_admin;

        return $this;
    }

    public function getCiUsr(): ?Usr
    {
        return $this->ci_usr;
    }

    public function setCiUsr(?Usr $ci_usr): self
    {
        $this->ci_usr = $ci_usr;

        return $this;
    }

    /**
     * @return Collection|Unit[]
     */
    public function getNumberUni(): Collection
    {
        return $this->number_uni;
    }

    public function addNumberUni(Unit $numberUni): self
    {
        if (!$this->number_uni->contains($numberUni)) {
            $this->number_uni[] = $numberUni;
            $numberUni->setComplain($this);
        }

        return $this;
    }

    public function removeNumberUni(Unit $numberUni): self
    {
        if ($this->number_uni->contains($numberUni)) {
            $this->number_uni->removeElement($numberUni);
            // set the owning side to null (unless already changed)
            if ($numberUni->getComplain() === $this) {
                $numberUni->setComplain(null);
            }
        }

        return $this;
    }
}
