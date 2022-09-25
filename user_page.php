<?php
session_start();
include 'config.php';

$id = $_SESSION['user_id'];

if(!isset($id)){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BOOKi - Mon profile</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/user.css"> 
</head>
<body>
   <?php include('header.php') ?>

   <div class="header-title">
      <br><br>
      <div class="title" style="height: 1.6em;">
         <abbr title="Mon profile">MON PROFILE</abbr>
      </div>
   </div>

<section class="profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
      $select_profile->execute([$id]);
      $fetch_profile = $select_profile->fetch();
   ?>

   <div class="profile">
      <h3><?php echo "Nom d'utilisateur : " . $fetch_profile['username']; ?></h3>
      <h3><?php echo "Email : " . $fetch_profile['email']; ?></h3>
      <a href="user_update.php" class="update-btn">Mise à jour de mon profil</a>
      <a href="cart.php" class="option-btn">Mon panier</a>
      <a href="delete_user.php" class="delete-btn">Supprimer le compte</a>
   </div>

</section>

</body>
</html>