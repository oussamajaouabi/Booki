<?php 
   session_start(); 
   if(!(isset($_SESSION['username']))){
      header('location:login.php');
   }
?>

<!DOCTYPE html>
<html>
<head lang="fr">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>BOOKi - Accueil</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <?php include('header.php') ?>
   <h1 class="welcome1"><?php echo "Bienvenue sur notre site, " . $_SESSION['username'] ."!"?></h1>
   <h1 class="welcome2">
      <div>
         BOOKi est un site de vente en ligne qui propose une collection de livres dans différentes catégories. <br>
         Il est géré par Oussama et Helmi dans le cadre du projet "Développemnet et apps web". <br>Nous vous souhaitons une bonne visite! &#129505;
      </div>
   </h1>
   
   <img class="home-img" src="images/welcome.png">

   <marquee scrollamount="10" class="credit"> &copy; copyright <?php echo date('Y'); ?> BOOKi réalisé par <span>Hamdi Helmi & Jaouabi Oussama</span> </marquee>
</body>
</html>