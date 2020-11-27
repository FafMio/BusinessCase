<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $body;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearOfCirculation;

    /**
     * @ORM\Column(type="integer")
     */
    private $mileage;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $reference;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasFiveDoors;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasMechanicalGearbox;

    /**
     * @ORM\Column(type="integer")
     */
    private $CO2emission;

    /**
     * @ORM\ManyToOne(targetEntity=Power::class, inversedBy="ads")
     */
    private $power;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="ads")
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="ads")
     */
    private $car;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="ad")
     */
    private $picture;

    public function __construct()
    {
        $this->picture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getYearOfCirculation(): ?int
    {
        return $this->yearOfCirculation;
    }

    public function setYearOfCirculation(int $yearOfCirculation): self
    {
        $this->yearOfCirculation = $yearOfCirculation;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getHasFiveDoors(): ?bool
    {
        return $this->hasFiveDoors;
    }

    public function setHasFiveDoors(bool $hasFiveDoors): self
    {
        $this->hasFiveDoors = $hasFiveDoors;

        return $this;
    }

    public function getHasMechanicalGearbox(): ?bool
    {
        return $this->hasMechanicalGearbox;
    }

    public function setHasMechanicalGearbox(bool $hasMechanicalGearbox): self
    {
        $this->hasMechanicalGearbox = $hasMechanicalGearbox;

        return $this;
    }

    public function getCO2emission(): ?int
    {
        return $this->CO2emission;
    }

    public function setCO2emission(int $CO2emission): self
    {
        $this->CO2emission = $CO2emission;

        return $this;
    }

    public function getPower(): ?Power
    {
        return $this->power;
    }

    public function setPower(?Power $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPicture(): Collection
    {
        return $this->picture;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->picture->contains($picture)) {
            $this->picture[] = $picture;
            $picture->setAd($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->picture->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getAd() === $this) {
                $picture->setAd(null);
            }
        }

        return $this;
    }
}
