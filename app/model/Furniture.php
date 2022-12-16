<?php

class Furniture extends AbstractProduct
{
    /**
     * @param float $height
     * @return void
     */
    public function setHeight(float $height): void
    {
        $this->setData('height', $height);
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->getData('height');
    }

    /**
     * @param float $width
     * @return void
     */
    public function setWidth(float $width): void
    {
        $this->setData('width', $width);
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->getData('width');
    }

    /**
     * @param float $length
     * @return void
     */
    public function setLength(float $length): void
    {
        $this->setData('length', $length);
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->getData('length');
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->getData('productId');
    }
}