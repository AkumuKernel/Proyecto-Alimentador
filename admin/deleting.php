<?php require "../includes/sql.php";

echo $_GET["token"];
$token = $_GET["token"];

$query = mysqli_query($db, "DELETE FROM user WHERE token='$token'");

if($query){
	header('location: delete.php?msg=Eliminacion exitosa');
}
else{
	header('location: delete.php?msg=Eliminacion fallida');
}
