<?php

namespace App\Domain\Service;

use App\Domain\Query\GetProductListQuery;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ProductService implements RetrieveProductsInterface
{
    /** @var MessageBusInterface  */
    private $messageBus;

    /**
     * ProductService constructor.
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function getProducts(): ?iterable
    {
        $query = $this->messageBus->dispatch(new GetProductListQuery());

        return $query->last(HandledStamp::class)->getResult();
    }
}