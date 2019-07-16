<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationRepository")
 */
class Station
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
    private $id_sta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_sta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_sta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSta(): ?int
    {
        return $this->id_sta;
    }

    public function setIdSta(int $id_sta): self
    {
        $this->id_sta = $id_sta;

        return $this;
    }

    public function getNameSta(): ?string
    {
        return $this->name_sta;
    }

    public function setNameSta(string $name_sta): self
    {
        $this->name_sta = $name_sta;

        return $this;
    }

    public function getAddressSta(): ?string
    {
        return $this->address_sta;
    }

    public function setAddressSta(string $address_sta): self
    {
        $this->address_sta = $address_sta;

        return $this;
    }
}
