<?php

namespace App\Entity;

use App\Repository\TreeDirectoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TreeDirectoryRepository::class)]
class TreeDirectory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'treeDirectories')]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private Collection $treeDirectories;

    #[ORM\OneToOne(mappedBy: 'tree', cascade: ['persist', 'remove'])]
    private ?Car $car = null;

    public function __construct()
    {
        $this->treeDirectories = new ArrayCollection();
    }

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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getTreeDirectories(): Collection
    {
        return $this->treeDirectories;
    }

    public function addTreeDirectory(self $treeDirectory): static
    {
        if (!$this->treeDirectories->contains($treeDirectory)) {
            $this->treeDirectories->add($treeDirectory);
            $treeDirectory->setParent($this);
        }

        return $this;
    }

    public function removeTreeDirectory(self $treeDirectory): static
    {
        if ($this->treeDirectories->removeElement($treeDirectory)) {
            // set the owning side to null (unless already changed)
            if ($treeDirectory->getParent() === $this) {
                $treeDirectory->setParent(null);
            }
        }

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
            $this->car->setTree(null);
        }

        // set the owning side of the relation if necessary
        if ($car !== null && $car->getTree() !== $this) {
            $car->setTree($this);
        }

        $this->car = $car;

        return $this;
    }
}
