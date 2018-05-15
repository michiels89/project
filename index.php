<?php

require_once'Product.php';

    $product = new Product;
    $productList = $product->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <?php
     print_r ($productList);
    ?>
    <div class="container">
        
    </div>
    
</body>
</html>