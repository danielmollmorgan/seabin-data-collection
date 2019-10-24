<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MeasurementMetaRepository")
 */
class MeasurementMeta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timeOfMeasurement;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastRainfall;

    /**
     * @ORM\Column(type="integer")
     */
    private $operatingTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Location", inversedBy="measurementMetas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="measurementMetas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="measurementMeta")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimeOfMeasurement(): ?\DateTimeInterface
    {
        return $this->timeOfMeasurement;
    }

    public function setTimeOfMeasurement(\DateTimeInterface $timeOfMeasurement): self
    {
        $this->timeOfMeasurement = $timeOfMeasurement;

        return $this;
    }

    public function getLastRainfall(): ?\DateTimeInterface
    {
        return $this->lastRainfall;
    }

    public function setLastRainfall(?\DateTimeInterface $lastRainfall): self
    {
        $this->lastRainfall = $lastRainfall;

        return $this;
    }

    public function getOperatingTime(): ?int
    {
        return $this->operatingTime;
    }

    public function setOperatingTime(int $operatingTime): self
    {
        $this->operatingTime = $operatingTime;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCreatedBy(): ?Person
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?Person $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setMeasurementMeta($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getMeasurementMeta() === $this) {
                $image->setMeasurementMeta(null);
            }
        }

        return $this;
    }
}
