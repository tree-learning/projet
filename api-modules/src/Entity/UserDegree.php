<?php

namespace App\Entity;

use App\Repository\UserDegreeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Trait\EntityStatusTrait;
use App\Entity\Trait\EntityTimestampableTrait;

#[ORM\Entity(repositoryClass: UserDegreeRepository::class)]
class UserDegree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $obtained_date = null;

    #[ORM\ManyToOne(inversedBy: 'degrees')]
    private ?User $user_degree = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?DegreeTitle $degreeTitle = null;

    use EntityStatusTrait;
    use EntityTimestampableTrait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObtainedDate(): ?\DateTimeInterface
    {
        return $this->obtained_date;
    }

    public function setObtainedDate(\DateTimeInterface $obtained_date): static
    {
        $this->obtained_date = $obtained_date;

        return $this;
    }

    public function getUserDegree(): ?User
    {
        return $this->user_degree;
    }

    public function setUserDegree(?User $user_degree): static
    {
        $this->user_degree = $user_degree;

        return $this;
    }

    public function getDegreeTitle(): ?DegreeTitle
    {
        return $this->degreeTitle;
    }

    public function setDegreeTitle(?DegreeTitle $degreeTitle): static
    {
        $this->degreeTitle = $degreeTitle;

        return $this;
    }
}
