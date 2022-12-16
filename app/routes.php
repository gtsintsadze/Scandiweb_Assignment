<?php

$page = $_SERVER["REQUEST_URI"] ?? null;
$requestMethod = $_SERVER["REQUEST_METHOD"];

switch ($page) {
    case @"/":
        $productRepository = new ProductRepository();

        $dvdCollection = $productRepository->getCollection('dvd');
        $bookCollection = $productRepository->getCollection('book');
        $furnitureCollection = $productRepository->getCollection("furniture");

        $template->render('index.php',
            [
                'dvdCollection' => $dvdCollection,
                'bookCollection' => $bookCollection,
                'furnitureCollection' => $furnitureCollection
            ]);
        break;
    case @"/add-product":
        if ($requestMethod === "POST") {
            $productType = ucfirst($_POST["type_switcher"]);

            $validator = new ValidateData();

            if (!$validator->validatePostData($productType)) {
                if ($validator->getErrors()) {
                    $template->render(
                        'add_product.php',
                        ['errors' => $validator->getErrors()]
                    );
                }
                exit();
            }

            require_once BASE_DIR . "/app/model/" . $productType . ".php";

            $productRepository = new ProductRepository();
            $productObject = new $productType();
            $productObject->setSku($_POST["sku"]);
            $productObject->setName($_POST["name"]);
            $productObject->setPrice($_POST["price"]);


            switch ($productType) {
                case "Dvd":
                    $productObject->setSize($_POST["size"]);
                    break;
                case "Furniture":
                    $productObject->setHeight($_POST["height"]);
                    $productObject->setWidth($_POST["width"]);
                    $productObject->setLength($_POST["length"]);
                    break;
                case "Book":
                    $productObject->setWeight($_POST["weight"]);
            }
            $productRepository->create($productObject);
        }

        $template->render(
            'add_product.php',
            ['errors' => []]
        );
        break;
    case @"/delete-products":
        $productRepository = new ProductRepository();

        $skus = array_map(function ($item) {
            return trim($item, '"');
        }, explode(',', array_key_first($_POST['{"skus":'])));

        $productRepository->massDelete($skus, 'sku');
        echo true;
}