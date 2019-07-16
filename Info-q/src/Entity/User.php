<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
 
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Complain", mappedBy="id_admin")
     */
    private $complains;

    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
        $this->complains = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

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
            $complain->setIdAdmin($this);
        }

        return $this;
    }

    public function removeComplain(Complain $complain): self
    {
        if ($this->complains->contains($complain)) {
            $this->complains->removeElement($complain);
            // set the owning side to null (unless already changed)
            if ($complain->getIdAdmin() === $this) {
                $complain->setIdAdmin(null);
            }
        }

        return $this;
    }


}
