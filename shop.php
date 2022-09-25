<?php

session_start();
include('config.php');

if (isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];
    $result = $conn->prepare("SELECT * FROM `products` WHERE `code`='$code'");
    $result->execute();
    $row = $result->fetch();
    $code = $row['code'];
    $name = $row['name'];
    $price = $row['price'];
    $image = $row['image'];
     
    $cartArray = array(
     $code=>array(
     'name'=>$name,
     'code'=>$code,
     'price'=>$price,
     'image'=>$image)
    );
 
    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $message_r = "Le produit est ajouté à votre panier!";
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]); //$code
        if(in_array($code,$array_keys)) {
            $message_e = "Ce produit a déjà été ajouté à votre panier!"; 
        }else{
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
            $message_r = "Le produit est ajouté à votre panier!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>BOOKi - Notre sélection</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/shop.css">
</head>
<body>
    <?php include('header.php') ?>
    
    <?php if(isset($message_e)){
            echo '
               <div class="alert">
               <span><b>ERREUR : </b>'.$message_e.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
            }
        if(isset($message_r)){
            echo '
               <div class="alert" style="background-color: #37c039;">
               <span>'.$message_r.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
          }
    ?>


<div class="header-prod">
      <br>
      <div class="title">
         <abbr title="Découvrez notre sélection!">NOTRE SÉLECTION!</abbr>
      </div>
   </div>

    <?php
    $result = $conn->prepare("SELECT * FROM `products`");
    $result->execute();
    while($row = $result->fetch()){
        echo "<div class='product_wrapper'>
                <form method='post' action=''>
                    <input type='hidden' name='code' value=".$row['code']." />
                    <div class='image'><img src='".$row['image']."'></div>
                    <div class='name'>".$row['name']."</div>
                    <div class='price'>".$row['price']." DT</div>
                    <button type='submit' class='buy'>Ajouter au panier</button>
                </form>
              </div>";
    }

   ?>
 
</body>
</html>