<?php
/**
 * Created by PhpStorm.
 * User: hknorr
 * Date: 20/02/19
 * Time: 14:15
 */

namespace App\Domain\QueryHandler;


use App\Domain\Query\GetProductListQuery;
use App\Domain\Repository\ProductRepositoryInterface;

class GetProductListQueryHandler
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

    public function __invoke(GetProductListQuery $query)
    {
        return $this->productRepository->findProducts();
    }
}