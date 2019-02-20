<?php
/**
 * Created by PhpStorm.
 * User: hknorr
 * Date: 20/02/19
 * Time: 13:59
 */

namespace App\Domain\Service;

use App\Domain\Command\CreateProductCommand;
use Symfony\Component\Messenger\MessageBusInterface;

class ProductCreator implements CreateProductInterface
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

    public function createProduct(?int $id, string $name): void
    {
        $this->messageBus->dispatch(new CreateProductCommand($id, $name));
    }
}