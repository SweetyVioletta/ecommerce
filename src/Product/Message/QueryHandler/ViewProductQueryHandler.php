<?php

namespace App\Product\Message\QueryHandler;

use App\Product\Message\Query\ViewProductQuery;
use App\Product\Message\Response\ProductResponse;
use App\Repository\ProductRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ViewProductQueryHandler implements MessageHandlerInterface
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ViewProductQuery $query): ProductResponse
    {
        $product = $this->repository->find($query->getId());

        if (!$product) {
            throw new \RuntimeException('Product with id '.$query->getId().' not found!');
        }

        return new ProductResponse($product);
    }
}
