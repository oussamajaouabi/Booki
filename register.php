<script type="text/javascript">
	function validate() { 
            var x = document.forms["myform"]["pass"].value;
            if(x.length < 8){
            	alert("Veuillez saisir un mot de passe de 8 caractères ou plus");
            	return false;
            }
            return true;
   }

    if (validate() == true) {
    <?php
		include 'config.php';

		if(isset($_POST['submit'])){

			$name = $_POST['name'];
		    $email = $_POST['email'];
	  	    $pass = $_POST['pass']; 
			$cpass = $_POST['cpass'];
		    $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
	  	    $select->execute([$email]);

			if($select->rowCount() > 0){
			    $message[] = "L'utilisateur existe déjà!";
			}else{
			    if($pass != $cpass){
			        $message[] = 'Les deux mots de passe ne sont pas identiques!';
			    }else{
			        $insert = $conn->prepare("INSERT INTO `users`(username, email, password) VALUES(?,?,?)");
			        $insert->execute([$name, $email, $cpass]);
			        if($insert){
			        	header('location:login.php');
			        }
			    }
			}
	    } 
	?>
	}
</script>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOOKi - Créer un compte</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="title"><span class="logo"><img src="images/img18.png"></span></div>
	
	<?php
		if(isset($message)){
	      	foreach($message as $message){
	        	echo '
	        		<div class="alert" id="alert">
	        		<span><b>ERREUR : </b>'.$message.'</span>
		         	<span class="closebtn" onclick="this.parentElement.remove();">&times;</span> 
 					</div>
	         	';
		    }
		}
	?>

	<section>
		<div class="container">
			<div class="user signupBx">
					
				<div class="formBx">
					<form action="" method="post" name="myform" onsubmit="return validate();">
						<h2>Créer un compte</h2>
						<input type="text" required placeholder="Nom d'utilisateur" name="name">
						<input type="email" required placeholder="Adresse Email" name="email">
						<input type="password" required placeholder="Mot de passe" name="pass" id="pass">
						<input type="password" required placeholder="Confirmer le mot de passe" name="cpass">
						<input type="submit" value="S'inscrire" name="submit">
						<p class="signup">Vous avez déjà un compte? <a href="login.php">Connectez-vous!</a></p>
					</form>
				</div>

				<div class="imgBx"><img src="images/register.jpg"></div>

			</div>
	    </div>
	</section>

</body>
</html>