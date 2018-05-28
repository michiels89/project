<?php
//require_once 'vendor/autoload.php';
require_once'Product.php';

    $productList = new Product;
    $products = $productList->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--    Styles-->
    <link rel="stylesheet" href="css/styles.css">
<!--    Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

    <title>Shop</title>
</head>
<body>

  <header>
   <a  class="btn btn-info" href="cartView.php"><i class="fa fa-shopping-cart"></i></a>
   </header>
    <div class="container">
       <h1 class="text-center">Shop</h1><br><br>
        <?php
        foreach($products as $product){
        ?>
        <div class="col-sm-4 col-md-3">
            <form action="cart.php?action=add&id=<?=$product['id'];?>" method="post">
                <div class="products">
                    <img class="img-responsive" src="images/<?=$product['image'];?>" alt="">
                    <h4 class="text-info"><?=$product['name'];?></h4>
                    <h4>€<?=$product['price'];?></h4>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="name" value="<?=$product['name'];?>">
                    <input type="hidden" name="price" value="<?=$product['price'];?>">
                    <input type="submit" name="add _to_cart" class="btn btn-info" value="Add to Cart">
                </div>
            
            </form>
        </div>
         <?php
        }
        ?>

    </div>
</body>
</html>