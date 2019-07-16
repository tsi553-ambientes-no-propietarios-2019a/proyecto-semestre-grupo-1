<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unit", mappedBy="id_sta")
     */
    private $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

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

    /**
     * @return Collection|Unit[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Unit $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setIdSta($this);
        }

        return $this;
    }

    public function removeUnit(Unit $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getIdSta() === $this) {
                $unit->setIdSta(null);
            }
        }

        return $this;
    }
}
