<?php

class ProductRepository extends AbstractRepository
{
    /**
     * @param AbstractProduct $product
     * @return void
     */
    protected function createProduct(AbstractProduct $product): void
    {
        $product->setData('typeId', $this->getTypeId(strtolower(get_class($product))));

        parent::createProduct($product);
    }

    /**
     * @param AbstractProduct $product
     * @return void
     */
    private function createChildProduct(AbstractProduct $product): void
    {
        $productId = $this->getPDO()->lastInsertId();

        $product->setData('product_id', $productId);
        $product->unsetData('typeId');

        parent::create($product);
    }

    /**
     * @param AbstractProduct $product
     * @return void
     */
    public function create(AbstractProduct $product): void
    {
        $this->createProduct($product);
        $this->createChildProduct($product);
    }
}