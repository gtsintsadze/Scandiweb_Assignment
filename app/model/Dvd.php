<?php

class Dvd extends AbstractProduct
{
    /**
     * @param int $size
     * @return void
     */
    public function setSize(int $size): void
    {
        $this->setData('size', $size);
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->getData('size');
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->getData("productId");
    }
}