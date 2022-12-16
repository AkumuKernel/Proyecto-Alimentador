<?php include "../includes/header.php";
include "../includes/sql.php";
$query = mysqli_query($db, "SELECT token, username, email FROM user");

?>

<main>
<?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
<?php

if(mysqli_num_rows($query) > 0){
	$table = '	
	 <table class="card table" border=1>
                    <tr>
                         <th>ID</th>
                         <th>Usuario</th>
                         <th>Email</th>
						 <th>Accion</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($query)){
	   $table .= '
	   <tr>
				<td>'.$row["token"].'</td>
                <td>'.$row["username"].'</td>
                <td>'.$row["email"].'</td>
                <td><a href="deleting.php?token='.$row["token"].'">Eliminar</a></td>
	   </tr>
	   ';
  }
  $table .= '</table>';
  echo $table;
}

?>	
</main>
