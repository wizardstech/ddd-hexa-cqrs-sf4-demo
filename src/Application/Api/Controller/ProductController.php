<?php

namespace App\Application\Api\Controller;

use App\Domain\Service\RetrieveProductsInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function list(RetrieveProductsInterface $retrieveProducts)
    {
        return $this->json($retrieveProducts->getProducts());
    }
}