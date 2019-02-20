<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Product;
use App\Domain\Repository\ProductRepositoryInterface;

class InMemoryProducts implements ProductRepositoryInterface
{
    /** @var Product[] */
    private static $products = [
        'Carte restaurant',
        'Carte cinéma',
        'Carte lavage',
    ];

    public function findProduct(int $id): ?Product
    {
        $name = self::$products[$id] ?? null;
        if ($name) {
            return new Product($id, $name);
        }
    }

    public function findProducts(): ?iterable
    {
        return array_map(function ($key, $name) {
            return new Product($key + 1, $name);
        }, array_keys(self::$products), self::$products);
    }

    public function createProduct(Product $product): void
    {
        // TODO: Implement createProduct() method.
    }
}