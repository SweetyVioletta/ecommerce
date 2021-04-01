<?php

namespace App\Product\Message\Command;

use Fusonic\HttpKernelExtensions\Dto\RequestDto;
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Constraints as Assert;

final class UpdateProductCommand implements RequestDto
{
    /**
     * @OA\Property(readOnly=true)
     * @Assert\NotNull(message="Id should not be null.")
     * @Assert\Positive(message="Id should be a positive integer.")
     */
    private int $id;

    /**
     * @Assert\NotNull(message="Name should not be null.")
     */
    private string $name;

    private string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

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
