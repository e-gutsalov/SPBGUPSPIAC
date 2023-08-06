<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $horses = null;

    #[ORM\Column(nullable: true)]
    private ?float $lVt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateProduction = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTimeProduction = null;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    private $image = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $documentation = null;

    #[ORM\OneToOne(inversedBy: 'car', cascade: ['persist', 'remove'])]
    private ?SimpleDirectory $simple = null;

    #[ORM\OneToOne(inversedBy: 'car', cascade: ['persist', 'remove'])]
    private ?TreeDirectory $tree = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getHorses(): ?int
    {
        return $this->horses;
    }

    public function setHorses(?int $horses): static
    {
        $this->horses = $horses;

        return $this;
    }

    public function getLVt(): ?float
    {
        return $this->lVt;
    }

    public function setLVt(?float $lVt): static
    {
        $this->lVt = $lVt;

        return $this;
    }

    public function getDateProduction(): ?\DateTimeInterface
    {
        return $this->dateProduction;
    }

    public function setDateProduction(?\DateTimeInterface $dateProduction): static
    {
        $this->dateProduction = $dateProduction;

        return $this;
    }

    public function getDateTimeProduction(): ?\DateTimeInterface
    {
        return $this->dateTimeProduction;
    }

    public function setDateTimeProduction(?\DateTimeInterface $dateTimeProduction): static
    {
        $this->dateTimeProduction = $dateTimeProduction;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDocumentation()
    {
        return $this->documentation;
    }

    public function setDocumentation($documentation): static
    {
        $this->documentation = $documentation;

        return $this;
    }

    public function getSimple(): ?SimpleDirectory
    {
        return $this->simple;
    }

    public function setSimple(?SimpleDirectory $simple): static
    {
        $this->simple = $simple;

        return $this;
    }

    public function getTree(): ?TreeDirectory
    {
        return $this->tree;
    }

    public function setTree(?TreeDirectory $tree): static
    {
        $this->tree = $tree;

        return $this;
    }
}
