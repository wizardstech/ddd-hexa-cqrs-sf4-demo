<?php
/**
 * Created by PhpStorm.
 * User: hknorr
 * Date: 20/02/19
 * Time: 14:30
 */

namespace App\Domain\Command;


class CreateProductCommand
{
    /** @var int|null */
    private $id;
    /** @var string */
    private $name;

    /**
     * CreateProductCommand constructor.
     * @param int|null $id
     * @param string $name
     */
    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}