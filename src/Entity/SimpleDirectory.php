<?php

namespace App\Entity;

use App\Repository\SimpleDirectoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SimpleDirectoryRepository::class)]
class SimpleDirectory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'simple', cascade: ['persist', 'remove'])]
    private ?Car $car = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): static
    {
        // unset the owning side of the relation if necessary
        if ($car === null && $this->car !== null) {
            $this->car->setSimple(null);
        }

        // set the owning side of the relation if necessary
        if ($car !== null && $car->getSimple() !== $this) {
            $car->setSimple($this);
        }

        $this->car = $car;

        return $this;
    }
}
