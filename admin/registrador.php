<?php
require "../includes/sql.php";

$username = "";
$errors = array(); 

if($_POST["username"] == "" || $_POST["password"]== "" || $_POST["token"]== ""){
  header('location: register.php?msg="Rellene todos los datos"');
}
else{
	if (isset($_POST['username'])) {
        
        $username = stripslashes($_POST['username']);        
        $username = mysqli_real_escape_string($db, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($db, $password);
        $token	  = stripslashes($_POST['token']);
        $query3	  = "SELECT token FROM `tokens` WHERE token='$token'";
        $result3  = mysqli_query($db, $query3);
        if(mysqli_fetch_row($result3)[0]){
			$token	  = mysqli_real_escape_string($db, $token);
			$query2	  = "DELETE FROM `tokens` WHERE token='$token'";
			$result2  = mysqli_query($db, $query2);
		}
        if($result2){
			$query    = "INSERT into `user` (token, username, password)
						VALUES ('$token' ,'$username'," . md5($password) . "' )";
			$result   = mysqli_query($db, $query);
		}
        if ($result) {
            header('location: login.php?msg=Registro exitoso');
        } else {
            header('location: register.php?msg=Registro Fallido');
        }
    }
}
