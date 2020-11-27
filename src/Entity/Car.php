<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Generation::class, inversedBy="cars")
     */
    private $generation;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="cars")
     */
    private $version;

    /**
     * @ORM\ManyToMany(targetEntity=Finish::class, inversedBy="cars")
     */
    private $finish;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\OneToMany(targetEntity=Ad::class, mappedBy="car")
     */
    private $ads;

    public function __construct()
    {
        $this->finish = new ArrayCollection();
        $this->ads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneration(): ?Generation
    {
        return $this->generation;
    }

    public function setGeneration(?Generation $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(?Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection|Finish[]
     */
    public function getFinish(): Collection
    {
        return $this->finish;
    }

    public function addFinish(Finish $finish): self
    {
        if (!$this->finish->contains($finish)) {
            $this->finish[] = $finish;
        }

        return $this;
    }

    public function removeFinish(Finish $finish): self
    {
        $this->finish->removeElement($finish);

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection|Ad[]
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->setCar($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getCar() === $this) {
                $ad->setCar(null);
            }
        }

        return $this;
    }
}
