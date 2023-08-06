<?php

namespace App\Entity;

use App\Repository\AccessRolesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccessRolesRepository::class)]
class AccessRoles
{
    public const ROLE_LIST_VIEW = 1;
    public const ROLE_ADD = 2;
    public const ROLE_EDIT = 3;
    public const ROLE_DELETE = 4;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

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
}
