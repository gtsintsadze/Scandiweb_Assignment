<?php

class Book extends AbstractProduct
{
    /**
     * @param float $weight
     * @return void
     */
    public function setWeight(float $weight): void
    {
        $this->setData('weight', $weight);
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->getData('weight');
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->getData('productId');
    }
}