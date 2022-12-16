<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/add_product.css">
    <title>Product Add</title>
</head>
<body>

<div class="product-add-header">
    <header class="flex-between-center">
        <h2 class="product-list-title">Product List</h2>
        <div class="product-add-header-buttons flex-between-center">
            <div>
                <button id="save-product-btn">save</button>
            </div>

            <div>
                <button id="cancel-btn"><a href="/">cancel</a></button>
            </div>
        </div>
    </header>
</div>



<form id="product-form" class="add-product" action="" method="post" novalidate>
    <div class="product-inputs">
        <div>
            <label for="sku">SKU</label>
            <?php ?>
            <input name="sku" id="sku" type="text">

        </div>

        <div>
            <label for="name">Name</label>
            <input name="name" id="name" type="text">
        </div>

        <div>
            <label for="price">Price($)</label>
            <input name="price" id="price" type="text">
        </div>
    </div>

    <div class="errors">
        <ul>
            <?php foreach ($errors as $errMsg) : ?>
                <li><?= $errMsg ?></li>
            <?php endforeach; ?>
        </ul>
    </div>


    <div class="product-type-switcher">
        <label class="type-switcher-label" for="type_switcher">Type Switcher</label>
        <select name="type_switcher" id="product_type" onchange="new Product().typeSwitch(this.value)">
            <option value="" disabled selected >Select Type</option>
            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
            <option value="book">Book</option>
        </select>
    </div>

    <div class="products">
        <div id="dvd" class="dvd hide">
            <div>
                <label for="size">Size(MB)</label>
                <input type="text" name="size" id="size">
            </div>
            <p class="description">Please, provide size</p>
        </div>

        <div id="furniture" class="furniture hide">
            <div>
                <label for="height">height(CM)</label>
                <input type="text" id="height" name="height">
            </div>

            <div>
                <label for="width">Width(CM)</label>
                <input type="text" name="width" id="width">
            </div>

            <div>
                <label for="length">Length</label>
                <input type="text" name="length" id="length">
            </div>
            <p class="description">Please, provide dimensions</p>
        </div>

        <div id="book" class="book hide">
            <div>
                <label for="weight">Weight(KG)</label>
                <input type="text" name="weight" id="weight">
            </div>
            <p class="description">Please, provide weight</p>
        </div>
    </div>
</form>

<footer class="product-list_footer page-content_footer">
    <p>Scandiweb Test Assignment</p>
</footer>

<script src="assets/js/product.js"></script>

<script>
    document.getElementById('save-product-btn').addEventListener('click', function () {
        document.getElementById('product-form').submit()
    })
</script>
</body>
</html>