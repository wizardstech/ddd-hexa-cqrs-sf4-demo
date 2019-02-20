<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Product;
use App\Domain\Repository\ProductRepositoryInterface;
use GuzzleHttp\Client;

class ApiProducts implements ProductRepositoryInterface
{
    private static $url = 'https://api.myjson.com/bins/13qlo2';

    /**
     * @var Client
     */
    private $client;

    /**
     * ApiProducts constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    public function findProduct(int $id): ?Product
    {
        // TODO: Implement findProduct() method.
    }

    public function findProducts(): ?iterable
    {
        $response = $this->client->request('GET', self::$url);
        $rawProducts = json_decode($response->getBody()->getContents());

        return array_map(function ($product) {
            return new Product($product->id, $product->name);
        }, $rawProducts);
    }

    public function createProduct(Product $product): void
    {
        // TODO: Implement createProduct() method.
    }
}