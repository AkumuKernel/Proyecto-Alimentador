<?php include "includes/session.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alimentador de Mascotas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="/css/style.css" as="style">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <header>
      <h1 class="title">Alimentador automatico de <span>Mascotas!</span></h1>
    </header>

    <div class="nav-bg">
      <nav class="principal-nav container">
        <a href="/">Inicio</a>
        <?php if(isset($_SESSION["username"])){ ?>
		  <a href="dashboard.php">Monitor</a>
		  <a href="edit.php">Datos Mascota</a>
          <a href="logout.php">Cerrar Sesion</a>
        <a href="#"><?php echo $user_check ?></a>
      <?php }else{ ?>
        <a href="login.php">Logeate</a>
        <a href="register.php">Registrate</a>
      <?php } ?>
      </nav>

    </div>
