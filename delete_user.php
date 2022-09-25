<?php 
   session_start();
   include 'config.php';

   $id = $_SESSION['user_id'];

   if(!isset($id)){
      header('location:login.php');
   }

   //suppression d'utilisateur.

   $delete = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete->execute([$id]);
   header('location:logout.php');         
?>