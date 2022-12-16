<?php
require "includes/sql.php";

$username = "";
$email    = "";
$errors = array(); 
$token = $_SESSION['username']['token'];

if($_POST["password1"] != $_POST["password2"]){
	header('location: modificador.php?msg="Las nuevas contrasenas deben coindir"');
}

$query1= mysqli_query($db, "SELECT email FROM user WHERE token='$token'");

if($_POST["email"]=="" && $_POST["password"]== ""){
  header('location: modificador.php?msg="Rellene los datos a modificar"');
}
else{
        
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($db, $email);
        $password = stripslashes($_POST['password1']);
        $password = mysqli_real_escape_string($db, $password);
        
		$query	  = "UPDATE `user` SET ";
		if($email != "" || $email != mysqli_fetch_array($query)["email"]){
			$query .= "email = '" . $email . "',";
		}
		if($password != ""){
			$query .= "password = '" . md5($password) . "'";
		}
		$query .= "WHERE token = '" . $_SESSION["username"]["token"] . "'";
		$result  = mysqli_query($db, $query);
        
        if ($result) {
            header('location: modificador.php?msg=Modificacion exitosa');
        } else {
            header('location: modificador.php?msg=Modificacion fallida');
        }
}
