<?php


namespace App\Product\Controller;

use App\Controller\ControllerResponseTrait;
use App\Product\Message\Command\CreateProductCommand;
use App\Product\Message\Command\DeleteProductCommand;
use App\Product\Message\Command\UpdateProductCommand;
use App\Product\Message\Query\ViewProductQuery;
use App\Product\Security\ProductVoter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Product\Message\Response\ProductResponse;

/**
 * @Route("/products")
 */
final class ProductController extends AbstractController
{
    use ControllerResponseTrait;
    private MessageBusInterface $queryBus;
    private MessageBusInterface $commandBus;

    public function __construct(
        MessageBusInterface $queryBus,
        MessageBusInterface $commandBus,
        SerializerInterface $serializer
    ) {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
        $this->serializer = $serializer;
    }
    /**
     * @OA\Tag(name="Product")
     * @OA\Response(
     *     @Model(type=ProductResponse::class),
     *     response=Response::HTTP_OK,
     *     description="Successful fetch of product."
     * )
     * @Route("/{id}", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function view(ViewProductQuery $query): Response
    {
        $this->isGranted(ProductVoter::VIEW);
        $envelope = $this->queryBus->dispatch($query);

        return $this->createJsonResponseFromEnvelope($envelope);

    }
    /**
     * @OA\Tag(name="Product")
     * @OA\Response(
     *     @Model(type=ProductResponse::class),
     *     response=Response::HTTP_CREATED,
     *     description="Successful create of product."
     * )
     * @Route("/", methods={"PUT"})
     */
    public function create(CreateProductCommand $command): Response
    {
        $this->isGranted(ProductVoter::CREATE);
        $envelope = $this->commandBus->dispatch($command);

        return $this->createJsonResponseFromEnvelope($envelope);


    }

    /**
     * @OA\Tag(name="Product")
     * @OA\Response(
     *     @Model(type=ProductResponse::class),
     *     response=Response::HTTP_OK,
     *     description="Successful update of customer."
     * )
     * @Route("/{id}", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function update(UpdateProductCommand $command): Response
    {
        $this->isGranted(ProductVoter::UPDATE);
        $envelope = $this->commandBus->dispatch($command);

        return $this->createJsonResponseFromEnvelope($envelope);

    }
    /**
     * @OA\Tag(name="Product")
     * @OA\Response(
     *     @Model(type=ProductResponse::class),
     *     response=Response::HTTP_OK,
     *     description="Successful delete of customer."
     * )
     * @Route("/{id}", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(DeleteProductCommand $command): Response
    {
        $this->isGranted(ProductVoter::DELETE);
        $envelope = $this->commandBus->dispatch($command);

        return $this->createJsonResponseFromEnvelope($envelope);

    }

}