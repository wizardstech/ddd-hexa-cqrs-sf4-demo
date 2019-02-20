<?php
/**
 * Created by PhpStorm.
 * User: hknorr
 * Date: 20/02/19
 * Time: 14:30
 */

namespace App\Domain\CommandHandler;


use App\Domain\Command\CreateProductCommand;
use App\Domain\Entity\Product;
use App\Domain\Repository\ProductRepositoryInterface;

class CreateProductCommandHandler
{
    /** @var ProductRepositoryInterface  */
    private $productRepository;

    /**
     * GetProductListQueryHandler constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(CreateProductCommand $command)
    {
        $this->productRepository->createProduct(new Product($command->getId(), $command->getName()));
    }
}