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
    private $ci_usr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_usr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_usr;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Complain", mappedBy="ci_usr")
     */
    private $complains;

    public function __construct()
    {
        $this->complains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiUsr(): ?int
    {
        return $this->ci_usr;
    }

    public function setCiUsr(int $ci_usr): self
    {
        $this->ci_usr = $ci_usr;

        return $this;
    }

    public function getNameUsr(): ?string
    {
        return $this->name_usr;
    }

    public function setNameUsr(string $name_usr): self
    {
        $this->name_usr = $name_usr;

        return $this;
    }

    public function getEmailUsr(): ?string
    {
        return $this->email_usr;
    }

    public function setEmailUsr(string $email_usr): self
    {
        $this->email_usr = $email_usr;

        return $this;
    }

    /**
     * @return Collection|Complain[]
     */
    public function getComplains(): Collection
    {
        return $this->complains;
    }

    public function addComplain(Complain $complain): self
    {
        if (!$this->complains->contains($complain)) {
            $this->complains[] = $complain;
            $complain->setCiUsr($this);
        }

        return $this;
    }

    public function removeComplain(Complain $complain): self
    {
        if ($this->complains->contains($complain)) {
            $this->complains->removeElement($complain);
            // set the owning side to null (unless already changed)
            if ($complain->getCiUsr() === $this) {
                $complain->setCiUsr(null);
            }
        }

        return $this;
    }
}
