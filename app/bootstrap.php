<?php

const BASE_DIR = __DIR__ . '/..';

require_once BASE_DIR."/app/core/Database.php";
require_once BASE_DIR."/app/config/database.php";
require_once BASE_DIR."/app/core/Template.php";
$db = new Database();
$template = new Template();
require_once BASE_DIR."/app/core/ValidateData.php";
require_once BASE_DIR."/app/core/Model.php";
require_once BASE_DIR."/app/core/AbstractRepository.php";
require_once BASE_DIR."/app/model/AbstractProduct.php";
require_once BASE_DIR."/app/model/Dvd.php";
require_once BASE_DIR."/app/model/Furniture.php";
require_once BASE_DIR."/app/model/Book.php";
require_once BASE_DIR."/app/model/ProductRepository.php";
require_once BASE_DIR."/app/routes.php";