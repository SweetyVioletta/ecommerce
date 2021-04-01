<?php

namespace App\Product\Message\CommandHandler;

use App\Product\Message\Command\UpdateProductCommand;
use App\Product\Message\Response\ProductResponse;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UpdateProductCommandHandler implements MessageHandlerInterface
{
    private ProductRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(ProductRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function __invoke(UpdateProductCommand $command): ProductResponse
    {
        $product = $this->repository->find($command->getId());

        if (null === $product) {
            throw new \RuntimeException('Product with id '.$command->getId().' not found!');
        }

        $product->setName($command->getName());
        $product->setDescription($command->getDescription());
        $this->em->persist($product);
        $this->em->flush();

        return new ProductResponse($product);
    }

}