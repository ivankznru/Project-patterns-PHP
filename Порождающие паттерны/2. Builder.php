<?php
/**
Позволяет создавать сложные объекты пошагово.
 * Строитель даёт возможность использовать один и тот же код строительства для получения разных представлений объектов.
 */

interface Builder
{
    public function buildA() : void;
    public function buildB() : void;
    public function buildC() : void;
}

class myBuilder1 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new Product1;
    }

    public function buildA(): void
    {
        // TODO: Implement buildA() method.
        $this->product->parts[] = 'PartA1';
    }

    public function buildB(): void
    {
        // TODO: Implement buildB() method.
        $this->product->parts[] = 'PartB1';
    }

    public function buildC(): void
    {
        // TODO: Implement buildC() method.
        $this->product->parts[] = 'PartC1';
    }

    public function getProduct() : Product1
    {
        $result = $this->product;
        $this->reset();

        return $result;
    }
}

class Product1
{
    public $parts = [];

    public function listParts(): void
    {
        echo "Product parts: " . implode(', ', $this->parts) . "\n\n";
    }
}

function clientCode()
{
    $builder = new myBuilder1();

    // Помните, что паттерн Строитель можно использовать без класса Директор.
    echo "Custom product:\n";
    $builder->buildA();
    $builder->buildB();
    $builder->getProduct()->listParts();
}

clientCode();