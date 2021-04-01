<?php

namespace App\Product\Message\CommandHandler;

use App\Entity\Product;
use App\Product\Message\Command\UpdateProductCommand;
use App\Product\Message\Response\ProductResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateProductCommandHandler implements MessageHandlerInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function __invoke(UpdateProductCommand $command): ProductResponse
    {
        $product = new Product();
        $product->setName($command->getName());
        $product->setDescription($command->getDescription());
        //validate
        $this->em->persist($product);
        $this->em->flush();

        return new ProductResponse($product);
    }

}