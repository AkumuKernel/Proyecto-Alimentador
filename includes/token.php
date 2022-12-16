<?php include "sql.php";
session_start();
   $user_check = $_SESSION['username']['name'];
   
   $ses_sql = mysqli_query($db,"select token from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $token = $row['token'];
   
   echo json_encode($token);
