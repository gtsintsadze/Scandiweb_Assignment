<?php

abstract class AbstractProduct extends Model
{
    /**
     * @param string $sku
     * @return void
     */
    public function setSku(string $sku): void
    {
        $this->setData('sku', $sku);
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->getData('sku');
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->setData('name', $name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData('name');
    }

    /**
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void
    {
        $this->setData('price', $price);
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->getData('price');
    }
}