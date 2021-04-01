<?php

namespace App\Product\Message\Command;

use Fusonic\HttpKernelExtensions\Dto\RequestDto;
use Symfony\Component\Validator\Constraints as Assert;

final class CreateProductCommand implements RequestDto
{
    /**
     * @Assert\NotNull(message="Name should not be null.")
     */
    private string $name;

    private string $description;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
