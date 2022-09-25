<?php
session_start();
include 'config.php';

if(isset($_POST['submit'])){

   $object = $_POST['object'];
   $email = $_POST['email'];
   $text = $_POST['text'];

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);
   $row = $select->fetch();
   if($select->rowCount() > 0 && $row['email'] == $_SESSION['email']){
      $insert = $conn->prepare("INSERT INTO `comments`(object,email,comment) VALUES(?,?,?)");
      $insert->execute([$object,$email,$text]);
      if($insert){
			$message_r[] = "Vote commentaire a été bien enregistré";
   	}
   }else{
         $message_e[] = "Vérifiez votre adresse email!";
   }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOOKi - Contactez nous</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

 	<?php include 'header.php' ?>

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
               <span><b>ERREUR : </b>'.$message_r.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
          }
      }
   ?>

   <div class="header-title">
      <br>
      <div class="title">
         <abbr title="Si vous avez des questions concernant notre pateforme n'hésiter pas à nous contacter!">CONTACTEZ-NOUS!</abbr>
      </div>
   </div>

	<section>
		<div class="container">

			<div class="user signinBx">

				<div class="formBx">
					<form action="" method="post">
						<h2>Contactez-Nous!</h2>
                  <input type="text" required placeholder="Objet" name="object" pattern="^[a-zA-Z][a-zA-Z' ']{4,19}" title="L'objet doit être composer de 5 à 20 caractères et commencer par une lettre.">
						<input type="email" required placeholder="Adresse Email" name="email">
						<div style="margin-top: 8px ; "><textarea name="text" cols="60" rows="5" placeholder="Exprimez vous" style="background: #f5f5f5;  font-size: 14px; padding-left: 8px; padding-top: 8px"></textarea></div>
						<input type="submit" value="Envoyer" name="submit">
					</form>
				</div>

				<div class="imgBx"><img src="images/contact.png"></div>

			</div>
		</div>
	</section>
</body>
</html>