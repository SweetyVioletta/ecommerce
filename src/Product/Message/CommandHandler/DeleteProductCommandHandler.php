<?php


namespace App\Product\Message\CommandHandler;

use App\Product\Message\Command\DeleteProductCommand;
use App\Product\Message\Response\ProductResponse;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DeleteProductCommandHandler implements MessageHandlerInterface
{
    private ProductRepository $repository;
    private EntityManagerInterface $em;

    public function __construct(ProductRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    public function __invoke(DeleteProductCommand $command): ProductResponse
    {
        $product = $this->repository->find($command->getId());

        if (null === $product) {
            throw new \RuntimeException('Product with id '.$command->getId().' not found!');
        }

        $this->em->remove($product);
        $this->em->flush();

        return new ProductResponse(null);
    }
}