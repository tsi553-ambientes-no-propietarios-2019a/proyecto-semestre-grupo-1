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
     * @ORM\Column(type="integer")
     */
    private $ci_usr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_usr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_usr;

    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
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

    public function getCiUsr(): ?int
    {
        return $this->ci_usr;
    }

    public function setCiUsr(int $ci_usr): self
    {
        $this->ci_usr = $ci_usr;

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

    public function getNameUsr(): ?string
    {
        return $this->name_usr;
    }

    public function setNameUsr(string $name_usr): self
    {
        $this->name_usr = $name_usr;

        return $this;
    }


}
