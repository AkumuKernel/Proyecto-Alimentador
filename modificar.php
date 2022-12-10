<?php
require "includes/sql.php";

$username = "";
$email    = "";
$errors = array(); 
$token = $_SESSION['username']['token'];

if($_POST["password1"] != $_POST["password2"]){
	header('location: modificador.php?msg="Las nuevas contrasenas deben coindir"');
}

$query1    = "SELECT password FROM `user` WHERE token='". $token ."' AND password='" . md5($_POST["password"]) . "'";
$result1  = mysqli_query($db, $query1);

do {
   if(!isset($row)){
	   header('location: modificador.php?msg=Contrasena incorrecta');
   }
}while($row = mysqli_fetch_assoc($result1));

if($_POST["password1"] == $_POST["password"]){
	header('location: modificador.php?msg=Las contrasena nueva debe ser diferente a la antigua');
}

if($_POST["username"] == "" || $_POST["email"]=="" || $_POST["password"]== "" || $_POST["password1"]== "" || $_POST["password2"]== ""){
  header('location: modificador.php?msg="Rellene todos los datos"');
}
else{
        
        $username = stripslashes($_POST['username']);        
        $username = mysqli_real_escape_string($db, $username);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($db, $email);
        $password = stripslashes($_POST['password1']);
        $password = mysqli_real_escape_string($db, $password);
        
        if($username != $_SESSION["username"]["name"] || $password != $_POST["password"] || $email != $_SESSION["username"]["email"]){
			$query	  = "UPDATE `user` SET ";
			if($username != $_SESSION["username"]["name"]){
				$query .= "username = '" . $username . "',";
			}
			if($email != $_SESSION["username"]["email"]){
				$query .= "email = '" . $email . "',";
			}
			if($password != $_POST["password"]){
				$query .= "password = '" . md5($password) . "'";
			}
			$query .= "WHERE token = '" . $_SESSION["username"]["token"] . "'";
			$result  = mysqli_query($db, $query);
		}
        
        if ($result) {
            header('location: modificador.php?msg=Modificacion exitosa');
        } else {
            header('location: modificador.php?msg=Modificacion fallida');
        }
}
