<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class Person
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MeasurementMeta", mappedBy="createdBy")
     */
    private $measurementMetas;

    public function __construct()
    {
        $this->measurementMetas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|MeasurementMeta[]
     */
    public function getMeasurementMetas(): Collection
    {
        return $this->measurementMetas;
    }

    public function addMeasurementMeta(MeasurementMeta $measurementMeta): self
    {
        if (!$this->measurementMetas->contains($measurementMeta)) {
            $this->measurementMetas[] = $measurementMeta;
            $measurementMeta->setCreatedBy($this);
        }

        return $this;
    }

    public function removeMeasurementMeta(MeasurementMeta $measurementMeta): self
    {
        if ($this->measurementMetas->contains($measurementMeta)) {
            $this->measurementMetas->removeElement($measurementMeta);
            // set the owning side to null (unless already changed)
            if ($measurementMeta->getCreatedBy() === $this) {
                $measurementMeta->setCreatedBy(null);
            }
        }

        return $this;
    }
}
