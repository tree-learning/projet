<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ChapterRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\EntityStatusTrait;
use App\Entity\Trait\EntityTimestampableTrait;

#[ORM\Entity(repositoryClass: ChapterRepository::class)]
#[ApiResource]
class Chapter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    use EntityStatusTrait;
    use EntityTimestampableTrait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
