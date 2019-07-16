<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitRepository")
 */
class Unit
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
    private $number_uni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_uni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $route;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Complain", inversedBy="number_uni")
     */
    private $complain;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Station", inversedBy="units")
     */
    private $id_sta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberUni(): ?int
    {
        return $this->number_uni;
    }

    public function setNumberUni(int $number_uni): self
    {
        $this->number_uni = $number_uni;

        return $this;
    }

    public function getTypeUni(): ?string
    {
        return $this->type_uni;
    }

    public function setTypeUni(string $type_uni): self
    {
        $this->type_uni = $type_uni;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getComplain(): ?Complain
    {
        return $this->complain;
    }

    public function setComplain(?Complain $complain): self
    {
        $this->complain = $complain;

        return $this;
    }

    public function getIdSta(): ?Station
    {
        return $this->id_sta;
    }

    public function setIdSta(?Station $id_sta): self
    {
        $this->id_sta = $id_sta;

        return $this;
    }
}
