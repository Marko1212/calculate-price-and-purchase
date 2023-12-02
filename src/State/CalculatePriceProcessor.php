<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Rpc\CalculatePrice;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CalculatePriceProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {
    }
    /**
     * @param CalculatePrice $data
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): JsonResponse
    {
        $product = $this->productRepository->find($data->getProduct());
        return new JsonResponse(['calculatedPrice' => $product->getPrice()]);
    }
}
