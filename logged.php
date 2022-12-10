<?php include "includes/sql.php";
session_start();
include "includes/header.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($db, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($db, $password);
        
        $query    = "SELECT * FROM `user` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($db, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows === 1) {
			foreach($result as $row) {
				$_SESSION['username'] = ["name" => $row["username"], "token" => $row["token"], "email" => $row["email"]];
			}
			header("location: dashboard.php");
        }
        else{
			header('location: login.php?msg="Usuario o Clave Incorrecta"');
		}
	}
}
?>
