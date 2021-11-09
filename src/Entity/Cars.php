<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsRepository::class)
 */
class Cars
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $plate;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="cars")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Seat::class, inversedBy="cars")
     */
    private $seat;

    /**
     * @ORM\ManyToOne(targetEntity=Motorization::class, inversedBy="cars")
     */
    private $motorization;

    /**
     * @ORM\OneToMany(targetEntity=Rental::class, mappedBy="cars")
     */
    private $rentals;

    public function __construct()
    {
        $this->rentals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlate(): ?string
    {
        return $this->plate;
    }

    public function setPlate(string $plate): self
    {
        $this->plate = $plate;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getStatus(): ?status
    {
        return $this->status;
    }

    public function setStatus(?status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSeat(): ?seat
    {
        return $this->seat;
    }

    public function setSeat(?seat $seat): self
    {
        $this->seat = $seat;

        return $this;
    }

    public function getMotorization(): ?motorization
    {
        return $this->motorization;
    }

    public function setMotorization(?motorization $motorization): self
    {
        $this->motorization = $motorization;

        return $this;
    }

    /**
     * @return Collection|Rental[]
     */
    public function getRentals(): Collection
    {
        return $this->rentals;
    }

    public function addRental(Rental $rental): self
    {
        if (!$this->rentals->contains($rental)) {
            $this->rentals[] = $rental;
            $rental->setCars($this);
        }

        return $this;
    }

    public function removeRental(Rental $rental): self
    {
        if ($this->rentals->removeElement($rental)) {
            // set the owning side to null (unless already changed)
            if ($rental->getCars() === $this) {
                $rental->setCars(null);
            }
        }

        return $this;
    }
    
}
