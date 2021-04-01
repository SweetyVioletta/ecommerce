<?php

namespace App\Product\Message\Response;

use App\Entity\Product;

class ProductResponse
{
    private ?Product $entity;

    public function __construct(?Product $entity)
    {
        $this->entity = $entity;
    }

    public function getId(): ?int
    {
        return $this->entity->getId();
    }

    public function getName(): string
    {
        return $this->entity->getName();
    }

    public function getDescription(): string
    {
        return $this->entity->getDescription();
    }

    public function getCreated(): \DateTimeInterface
    {
        return $this->entity->getCreated();
    }

    public function getUpdated(): \DateTimeInterface
    {
        return $this->entity->getUpdated();
    }
}