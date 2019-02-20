<?php

namespace App\Application\Web\Controller;

use App\Application\Web\Form\ProductType;
use App\Domain\Service\RetrieveProductsInterface;
use App\Domain\Service\CreateProductInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function list(RetrieveProductsInterface $retrieveProducts): Response
    {
        return $this->render('index.html.twig', [
            'products' => $retrieveProducts->getProducts()
        ]);
    }

    /**
     * @Route("/product/new", name="product_new")
     */
    public function create(Request $request, CreateProductInterface $productCreator)
    {
        $form = $this->createForm(ProductType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productCreator->createProduct(null, $form->get('name')->getData());

            return $this->redirectToRoute('app_products');
        }

        return $this->render('create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}