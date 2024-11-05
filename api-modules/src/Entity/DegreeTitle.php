<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Enum\DegreeLevel;
use App\Repository\DegreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\EntityStatusTrait;
use App\Entity\Trait\EntityTimestampableTrait;

#[ORM\Entity(repositoryClass: DegreeRepository::class)]
#[ApiResource]
class DegreeTitle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true, enumType: DegreeLevel::class)]
    private ?DegreeLevel $level = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $speciality = null;

    use EntityStatusTrait;
    use EntityTimestampableTrait;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?DegreeLevel
    {
        return $this->level;
    }

    public function setLevel(?DegreeLevel $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(?string $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

}
