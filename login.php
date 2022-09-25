<?php
session_start();
include 'config.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select->execute([$email, $pass]);
   $row = $select->fetchAll();

	if($select->rowCount() > 0){
	   if (isset($_POST['email']) && isset($_POST['pass'])){
	   	foreach ($row as $row){
	     	 	if ( $row['email'] == $_POST['email'] && $row['password'] == $_POST['pass'] ){
	        		$_SESSION['user_id'] = $row['id'];
	        		$_SESSION['email'] = $row['email'];
	        		$_SESSION['username'] = $row['username'];
	        	 	header('location:index.php');
	      	}
	      }
	   }
	}else{
	   $message[] = 'Email ou mot de passe incorrect!';
	}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOOKi - Connectez-vous</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="title"><span class="logo"><img src="images/img18.png"></span></div>

   <?php
      if(isset($message)){
            foreach($message as $message){
            echo '
               <div class="alert">
               <span><b>ERREUR : </b>'.$message.'</span>
                  <span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
               </div>
               ';
          }
      }
   ?>

	<section>
		<div class="container">
			<div class="user signinBx">

				<div class="imgBx"><img src="images/login.png"></div>

				<div class="formBx">
					<form action="" method="post">
						<h2>Connectez-Vous!</h2>
						<input type="email" required placeholder="Adresse Email" name="email">
						<input type="password" required placeholder="Mot de passe" name="pass">
						<input type="submit" required value="Login" name="submit">
						<p class="signup">Vous n'avez pas de compte? <a href="register.php">Créer un compte</a></p>
					</form>
				</div>

			</div>
		</div>
	</section>
</body>
</html>