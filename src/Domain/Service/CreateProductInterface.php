<?php

namespace App\Domain\Service;

interface CreateProductInterface
{
    public function createProduct(?int $id, string $name): void;
}