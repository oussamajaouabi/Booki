<?php
session_start();

if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["shopping_cart"])){
    foreach($_SESSION["shopping_cart"] as $key => $value){
      if($_POST["code"] == $key){
        unset($_SESSION["shopping_cart"][$key]);
        $status = "Le produit est supprimé de votre panier!";
      }
      if(empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);
    } 
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/cart.css">
  <title>BOOKi - Mon Panier</title>
</head>
<body>
  <?php include('header.php') ?>

  <?php if(isset($status)){
            echo '
               <div class="alert"">
                  <span>'.$status.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
        } ?>

  <div class="header-title">
      <br>
      <div class="title" style="height: 1.6em;">
         <abbr title="Mon panier">MON PANIER</abbr>
      </div>
  </div>

  <div class="cart">
    <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price = 0;
    ?> 

    <table class="table">
      <tr>
        <td></td>
        <td>Nom du livre</td>
        <td>Prix Unitaire</td>
      </tr> 

      <?php foreach ($_SESSION["shopping_cart"] as $product){ ?>
        <tr>
          <td><img src='<?php echo $product["image"]; ?>' width="45" height="60" /></td>
          <td>
            <?php echo $product["name"]; ?><br/>
            <form method='post'>
              <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
              <input type='hidden' name='action' value="remove" />
              <button type='submit' class='remove'>Retirer</button>
            </form>
          </td>

          <td style="text-align: center;"><?php echo $product["price"]*1 . "DT"; ?></td>
        </tr>

      <?php $total_price += $product["price"]; } ?>
      <tr>
        <td colspan="3" align="right">
          <strong>TOTAL: <?php echo $total_price . "DT"; ?></strong>
          <br>
          <button type="submit" style="height: 3em; cursor: pointer; padding: 0em 1em; margin-top: 1em;">Passer à la caisse</button>
        </td>
      </tr>
    </table> 
      <?php }else{
              echo '<h3 style="text-align: center; font-size: 2em; margin-top: 1em">Votre panier est vide</h3>';
            }?>
  </div>
</body>
</html>