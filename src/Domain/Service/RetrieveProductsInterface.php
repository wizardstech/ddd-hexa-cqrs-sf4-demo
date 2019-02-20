<?php

namespace App\Domain\Service;

interface RetrieveProductsInterface
{
    public function getProducts(): ?iterable;
}