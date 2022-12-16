<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/product_list.css">
    <title>Product List</title>
</head>
<body>

<div class="main-content-list">
    <div>
        <div class="product-list-header">
            <header>
                <h2 class="product-list-title">Product List</h2>
                <div class="product-list-header-buttons">
                    <button id="add-product-btn"><a href="add-product">ADD</a></button>
                    <button id="delete-product-btn" onclick="new Product().delete()">Mass Delete</button>
                </div>
            </header>
        </div>


        <?php if (empty($dvdCollection) && empty($bookCollection) && empty($furnitureCollection)): ?>
            <div class="empty-product-msg">
                There is no product added
            </div>
        <?php endif;?>

        <div class="product-list-content">
            <?php foreach ($dvdCollection as $item) : ?>
                <div id="<?= $item->getSku() ?>" class="product-box">
                    <input value="<?= $item->getSku() ?>" type="checkbox" class="delete-checkbox">
                    <div class="product-box-content">
                        <div><?= $item->getSku() ?></div>
                        <div><?= $item->getName() ?></div>
                        <div><?= $item->getPrice() ?> $</div>
                        <div>Size: <?= $item->getSize() ?> MB</div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($bookCollection as $item) : ?>
                <div id="<?= $item->getSku() ?>" class="product-box">
                    <input value="<?= $item->getSku() ?>" type="checkbox" class="delete-checkbox">
                    <div class="product-box-content">
                        <div><?= $item->getSku() ?></div>
                        <div><?= $item->getName() ?></div>
                        <div><?= $item->getPrice() ?> $</div>
                        <div>Weight: <?= $item->getWeight() ?>KG</div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($furnitureCollection as $item) : ?>
                <div id="<?= $item->getSku() ?>" class="product-box">
                    <input value="<?= $item->getSku() ?>" type="checkbox" class="delete-checkbox">
                    <div class="product-box-content">
                        <div><?= $item->getSku() ?></div>
                        <div><?= $item->getName() ?></div>
                        <div><?= $item->getPrice() ?> $</div>
                        <div> Dimension: <?= $item->getHeight() ?> x <?= $item->getWidth() ?> x <?= $item->getLength() ?> </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<footer class="product-list_footer">
    <p>Scandiweb Test Assignment</p>
</footer>
<script src="assets/js/product.js"></script>
<script>
    if (document.querySelector('.product-box') === null) {
        document.querySelector(".empty-product-msg").style.display = "flex"
        document.querySelector(".product-list-content").style.height = "75vh"
    }
</script>
</body>
</html>



