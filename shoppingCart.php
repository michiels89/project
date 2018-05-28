<?php 
session_start();
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
    <title>Shopping Cart</title>
</head>
<body>
    <div class="container">
       <h1 class="text-center">Shopping Cart</h1><br><br>
       <div class="col-sm-4 col-md-3">
       <div class="clear"></div>
       <br>
       <div class="table-responsive">
           <table class="table">
               <tr><th colspan="5"><h3>Order Details</h3></th></tr>
               <tr>
                   <th class="col1">Product Name</th>
                   <th class="col2">Quantity</th>
                   <th class="col3">Price</th>
                   <th class="col4">Total</th>
                   <th class="col5">Action</th>
               </tr>
               <?php
               if(!empty($_SESSION['shopping_cart'])){
                   $total = 0;
                   foreach($_SESSION['shopping_cart'] as $value => $product){
                       ?>
                       
                       <tr>
                           <td><?=$product['name'];?></td>
                           <td><?=$product['quantity'];?></td>
                           <td>€<?=$product['price'];?></td>
                           <td>€<?= number_format($product['quantity'] * $product['price'], 2);?></td>
                           <td>
                               <a href="cart.php?action=delete&id=<?=$product['id'];?>">
                                   <div class="btn btn-danger">Remove</div>
                               </a>
                           </td>
                       </tr>
                       <?php
                       $total = $total + ($product['quantity'] * $product['price']);
                   }?>
                   <tr>
                       <td colspan="3" align="right">Total</td>
                       <td align="right">€ <?=number_format($total, 2);?></td>
                       <td></td>
                   </tr>
                   <tr>
<!--                       show checkout button only if the shopping cart is not empty-->
                       <td colspan="5">
                           <?php
                            if(isset($_SESSION['shopping_cart'])){
                                if(count($_SESSION['shopping_cart']) > 0){
                                    ?>
                                    <a href="#" class="button">Checkout</a>
                                <?php    
                                }
                             }               
                                ?>
                       </td>
                   </tr>
            <?php       
               }
               ?>
           </table>
       </div>
        <a href="index.php" class= "btn btn-info">Back</a>
        </div>
    </div>
</body>
</html>