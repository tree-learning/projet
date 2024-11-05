<?php
namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Enum\Status;

trait EntityStatusTrait
{
    #[ORM\Column(nullable: true, enumType: Status::class)]
    private ?Status $status = null;

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }
}
