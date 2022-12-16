<?php

class ValidateData
{
    private array $errors;

    /**
     * @param $value
     * @return bool
     */
    public function isEmpty($value): bool
    {
        return $value === "";
    }

    /**
     * @param $value
     * @return bool
     */
    public function isValidNum($value): bool
    {
        if ($value !== "" && !is_numeric($value) || (float)$value <0) {
            return false;
        }
        return true;
    }

    /**
     * @return void
     */
    public function validateProductData(): void
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        if ($this->isEmpty($sku)) {
            $this->errors[] = 'SKU is missing';
        }

        if ($this->isEmpty($name)) {
            $this->errors[] = 'Name is missing';
        }

        if ($this->isEmpty($price)) {
            $this->errors[] = 'Price is missing';
        }

        if (!$this->isValidNum($price)) {
            $this->errors[] = 'Price must be a valid value';
        }
    }

    /**
     * @return void
     */
    public function validateBookData(): void
    {
        $weight = $_POST['weight'];

        if ($this->isEmpty($weight)) {
            $this->errors[] = 'Weight is empty';
        }

        if (!$this->isValidNum($weight)) {
            $this->errors[] = 'Weight must be a valid value';
        }
    }

    /**
     * @return void
     */
    private function validateDvdData(): void
    {
        $size = $_POST['size'];

        if ($this->isEmpty($size)) {
            $this->errors[] = 'Size is empty';
        }

        if (!$this->isValidNum($size)) {
            $this->errors[] = 'Size must be a valid value';
        }
    }

    /**
     * @return void
     */
    private function validateFurnitureData(): void
    {
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];

        if ($this->isEmpty($height)) {
            $this->errors[] = 'Height is empty';
        }

        if ($this->isEmpty($width)) {
            $this->errors[] = 'Width is empty';
        }

        if ($this->isEmpty($length)) {
            $this->errors[] = 'Length is empty';
        }

        if (!$this->isValidNum($height)) {
            $this->errors[] = 'Height must be a valid value';
        }

        if (!$this->isValidNum($width)) {
            $this->errors[] = 'Width must be a valid value';
        }

        if (!$this->isValidNum($length)) {
            $this->errors[] = 'Length must be a valid value';
        }
    }

    /**
     * @return void
     */
    public function validateType(): void
    {
        if (!isset($_POST['type_switcher'])) {
            $this->errors[] = 'Please choose a product type';
        }
    }

    /**
     * @param $productType
     * @return bool
     */
    public function validatePostData($productType): bool
    {
        $this->validateProductData();

        $this->validateType();

        switch ($productType) {
            case 'Dvd':
                $this->validateDvdData();
                break;
            case 'Furniture':
                $this->validateFurnitureData();
                break;
            case 'Book':
                $this->validateBookData();
        }

        if (isset($this->errors)) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}