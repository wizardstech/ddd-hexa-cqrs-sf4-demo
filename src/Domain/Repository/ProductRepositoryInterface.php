<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Product;

interface ProductRepositoryInterface
{
    public function findProduct(int $id): ?Product;

    public function findProducts(): ?iterable;

    public function createProduct(Product $product): void;
}