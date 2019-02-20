<?php

namespace App\Application\Console;

use App\Domain\Entity\Product;
use App\Domain\Service\ProductService;
use App\Domain\Service\RetrieveProductsInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListProducts extends Command
{
    protected static $defaultName = 'app:list:products';

    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ListProducts constructor.
     */
    public function __construct(RetrieveProductsInterface $productService)
    {
        $this->productService = $productService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('List all products');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'List Products',
            '=============',
            ''
        ]);

        /** @var Product[] $products */
        $products = $this->productService->getProducts();

        foreach ($products as $product) {
            $output->writeln($product->getName());
        }
    }
}