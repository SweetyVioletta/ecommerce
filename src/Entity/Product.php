<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *         schema="Product",
 *         @OA\Property(
 *            property="id",
 *            type="integer",
 *            example=1
 *        ),
 *        @OA\Property(
 *           property="name",
 *           type="string",
 *           example="Product 1"
 *        ),
 *        @OA\Property(
 *            property="description",
 *            type="string",
 *            example="This product is best for you"
 *        ),
 *        @OA\Property(
 *            property="created",
 *            type="datetime",
 *            example="2021-01-01 01:01:01"
 *        ),
 *        @OA\Property(
 *            property="updated",
 *            type="datetime",
 *            example="2021-01-01 01:01:01"
 *        ),
 *     ),
 * )
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $created;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $updated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function __construct()
    {
        $this->created = $this->updated = new DateTime('now');
    }
}
