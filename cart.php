<?php
session_start();
$productIds = [];
//session_destroy();

//check if Add to Cart button has been submitted

if(isset($_GET['action']) && $_GET['action'] == 'add'){
    
    if(isset($_SESSION['shopping_cart'])){
        
        // keep tract how much items are in my shoppping cart 
        $count = count($_SESSION['shopping_cart']);
        //create sequantial array for matching arrays keys to product id's
        $productIds = array_column($_SESSION['shopping_cart'], 'id');
        if(!in_array(filter_input(INPUT_GET, 'id'), $productIds)){
        $_SESSION['shopping_cart'][$count] = array
            (
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
            );  

        }else{ // product already exists, increase quantity
            //match array key to id of the product being added to the cart 
            for($i = 0; $i < count($productIds); $i++){
                if($productIds[$i] == filter_input(INPUT_GET, 'id')){
                    // add item quantity to the existing product in the array
                   $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }

        }
    }else{   // if shopping cart doesn't exist, create first product with array key 0
        // create arrey using submitted form datat, start from key 0 and fill it with values
        $_SESSION['shopping_cart'][0] = array
            (
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
             );

    }
                        echo "<script>

        window.location.href='index.php';
                window.alert('Product added to shopping cart');
        </script>";
}

//remove from cart
if(filter_input(INPUT_GET, 'action') == 'delete'){
    // loop trough all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if($product['id'] == filter_input(INPUT_GET, 'id')){
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session arrar keys so they match with the $productIds numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    echo "<script>

      window.location.href='shoppingCart.php';
                window.alert('Product removed from shopping cart');
       </script>";
}




//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}