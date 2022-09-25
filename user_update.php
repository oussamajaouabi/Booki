<?php
include 'config.php';
session_start();
$id = $_SESSION['user_id'];

if(!isset($id)){
   header('location:login.php');
};

if(isset($_POST['update'])){

   $name = $_POST['name'];
   $email = $_POST['email'];

   $update_name = $conn->prepare("UPDATE `users` SET username = ? WHERE id = ?");
   $update_name->execute([$name, $id]);
   if($update_name){
      if ($_SESSION['username'] != $name) {
         $_SESSION['username'] = $name;
         $message_r[] = "Le nom d'utilisateur a été bien modifiée!";
      }
   }

   $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
   $update_email->execute([$email, $id]);
   if($update_email){
      if ($_SESSION['email'] != $email) {
         $_SESSION['email'] = $email;
         $message_r[] = "L'email a été bien modifiée!";
      }
   }

   $old_pass = $_POST['old_pass'];
   $previous_pass = $_POST['previous_pass'];
   $new_pass = $_POST['new_pass'];
   $confirm_pass = $_POST['confirm_pass'];


   if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($previous_pass != $old_pass){
         $message_e[] = "Mot de passe incorrecte!";
      }elseif($new_pass != $confirm_pass){
         $message_e[] = 'Les deux mots de passe ne sont pas identiques!';
      }else{
         $update_password = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_password->execute([$confirm_pass, $id]);
         if($update_password){
            $message_r[] = "Le mot de passe a été bien modifiée!";
            $_SESSION['pass'] = $confirm_pass;
         }
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
   <title>BOOKi - Mis à jour du profil</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/user.css">
</head>
<body>

   <?php include('header.php') ?>

   <div class="header-prod">
      <br>
      <div class="title">
         <abbr title="Mettre à jour votre profil">METTRE À JOUR VOTRE PROFIL</abbr>
      </div>
   </div>

   <?php
      if(isset($message_e)){
            foreach($message_e as $message_e){
            echo '
               <div class="alert">
               <span><b>ERREUR : </b>'.$message_e.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
          }
      }
      if(isset($message_r)){
            foreach($message_r as $message_r){
            echo '
               <div class="alert" style="background-color: #37c039;">
               <span>'.$message_r.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
          }
      }
   ?>

   <section class="update-profile-container">

      <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$id]);
         $fetch_profile = $select_profile->fetch();
      ?>

      <form action="" method="post">
         <div class="flex">
            <div class="inputBox">
               <label for="name">Nom d'utilisateur : </label>
               <input type="text" name="name" required id="name" class="box" placeholder="Entrez votre nom" value="<?php echo $fetch_profile['username']; ?>">
               <label for="email">Email : </label>
               <input type="email" name="email" required id="email" class="box" placeholder="Entrez votre email" value="<?php echo $fetch_profile['email']; ?>"> 
            </div>
            <div class="inputBox">
               <input type="hidden" name="old_pass" value="<?php echo $fetch_profile['password']; ?>">
               <label for="password">Ancien mot de passe :</label>
               <input type="password" class="box" name="previous_pass" id="password" placeholder="Entrez votre ancien mot de passe" >
               <label for="new_pass">Nouveau mot de passe :</label>
               <input type="password" class="box" id="new_pass" name="new_pass" placeholder="Entrez votre nouveau mot de passe" >
               <label for="confirm_pass">Confirmer le mot de passe :</label>
               <input type="password" class="box" name="confirm_pass" id="confirm_pass" placeholder="Confirmer le nouveau mot de passe" >
            </div>
         </div>

         <input type="submit" value="Mise à jour du profil" name="update" class="update-btn" style="width: 15em;padding: 1em 2em; color: #fff; font-size: 14px; letter-spacing: 1px;">
         
      </form>

   </section>

</body>
</html>