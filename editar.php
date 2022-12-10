<?php include "includes/sql.php";
session_start();
include "includes/header.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if (isset($_POST['pet'])) {
        $pettype = stripslashes($_REQUEST['pettype']);
        $pettype = mysqli_real_escape_string($db, $pettype);
        $weight = stripslashes($_REQUEST['weight']);
        $weight = mysqli_real_escape_string($db, $weight);
        
        $query    = "SELECT * FROM `pets` WHERE pet='".$pettype."' AND weight=". $weight;
        
        $result = mysqli_query($db, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows === 1) {
			foreach($result as $row) {
				print_r($row);
			}
			header("location: dashboard.php");
        }
        elseif($rows===0){
			$query    = "INSERT into `pets` (pet, weight)
						VALUES ('$pettype' ,'$weight' )";
			$result   = mysqli_query($db, $query);
			header('location: edit.php?msg="Ingreso de mascota correcto"');
		}
        else{
			header('location: edit.php?msg="Ingreso de datos fallido"');
		}
	}
}
?>
