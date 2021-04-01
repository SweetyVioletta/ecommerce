<?php

namespace App\Product\Message\Query;

use Fusonic\HttpKernelExtensions\Dto\RequestDto;
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Constraints as Assert;

final class ViewProductQuery implements RequestDto
{
    /**
     * @OA\Property(readOnly=true)
     * @Assert\NotNull(message="Id should not be null.")
     * @Assert\Positive(message="Id should be a positive integer.")
     */
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
