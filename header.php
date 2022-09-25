<header>

   <div class="header-1">
      <div class="flex">
         <p>Si vous n'êtes pas <?php echo $_SESSION['username'] ?>? <a href="login.php">Login</a> | <a href="register.php">Créer un nouveau compte</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="index.php"><img src="images/img17.png"></a>

         <nav class="navbar">
            <a href="index.php">ACCUEIL</a>
            <a href="shop.php">PRODUITS</a>
            <a href="contact.php">CONTACT</a>
         </nav>

         <div class="icons">
            <a class="fas fa-user" href="user_page.php" title="Mon profil"> <span><?php echo $_SESSION["username"]; ?></span></a>
            <a href="cart.php" title="Mon panier"> <i class="fas fa-shopping-cart">
               <span>(<?php if(!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                        $_SESSION['count'] = $cart_count;
                        echo $_SESSION['count'];
                     }else{
                        echo 0;
                     }?>)</span></i></a>

            <a href="logout.php" class="logout-btn"><button>Logout</button></a>
         </div>

      </div>
   </div>

</header>
</body>
</html>