<?php

abstract class AbstractRepository extends Database
{
    protected function createProduct(AbstractProduct $product): void
    {
        $sql = "INSERT INTO product(sku, name, price, type_id) VALUES (:sku, :name, :price, :type_id)";
        $statement = $this->prepare($sql);
        $statement->execute([
            ':sku' => $product->getSku(),
            ':name' => $product->getName(),
            ':price' => $product->getPrice(),
            ':type_id' => $product->getData('typeId')
        ]);
    }

    public function getCollection($tableName): array
    {
        $sql = "SELECT * FROM $tableName JOIN product p ON ($tableName.product_id = p.product_id)";
        $statement = $this->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $collection = [];
        $className = ucfirst($tableName);
        foreach ($data as $value) {
            $productObject = null;
            switch ($className) {
                case 'Dvd':
                    $productObject = new $className();
                    $productObject->setSize($value['size']);
                    break;
                case 'Furniture':
                    $productObject = new $className();
                    $productObject->setHeight($value['height']);
                    $productObject->setWidth($value['width']);
                    $productObject->setLength($value['length']);
                    break;
                case 'Book':
                    $productObject = new $className();
                    $productObject->setWeight($value['weight']);
            }

            if ($productObject) {
                $productObject->setSku($value['sku']);
                $productObject->setName($value['name']);
                $productObject->setPrice($value['price']);
                $productObject->setData('productId', $value['product_id']);
                $collection[] = $productObject;
            }
        }
        return $collection;
    }

    public function create(AbstractProduct $product): void
    {
        $tableName = strtolower(get_class($product));
        $properties = array_merge(
            $this->getProperties($product, $tableName),
        );
        $columns = implode(', ', array_keys($properties));
        $columns2 = implode(', ', array_map(function ($columName) {
            return substr($columName, 1);
        }, array_keys($properties)));


        $sql = "INSERT INTO $tableName($columns2) VALUES($columns)";
        $statement = $this->prepare($sql);
        $statement->execute($properties);
    }

    public function massDelete(array $data, $key)
    {
        $in  = str_repeat('?,', count($data) - 1) . '?';
        $sql = "DELETE FROM product WHERE $key IN ($in)";
        $statement = $this->prepare($sql);
        $statement->execute($data);
    }

    protected function getTypeId($type)
    {
        $sql = "SELECT type_id FROM product_types WHERE product_name = ?";
        $statement = $this->prepare($sql);
        $statement->execute([$type]);

        return $statement->fetch()["type_id"];
    }
}