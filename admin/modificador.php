<?php include "../includes/header.php";
include "../includes/sql.php";

$token= $_POST["token"];

$query = mysqli_query($db, "SELECT * FROM user WHERE token='$token'");

print_r(mysqli_num_rows($query));

if(mysqli_num_rows($query) > 0 ){
	?>
	    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="modificar.php" method="post">
        <fieldset>

          <legend>Ingrese sus datos</legend>

            <div class="fieldset">
              <label for="nombre">Usuario</label>
              <input class="input-text" type="text" name="username" placeholder="" disabled value="<?php echo mysqli_fetch_array($query)["username"]; ?>">
            </div>

            <div class="fieldset">
              <label for="email">Email</label>
              <input class="input-text" type="mail" name="email" value="<?php echo $email ?>">
            </div>
			
            <div class="fieldset">
              <label for="contraseña">Nueva Contraseña</label>
              <input class="input-text" type="password" name="password1" placeholder="Contraseña" value="<?php echo $password; ?>">
            </div>
            
            <div class="fieldset">
              <label for="contraseña">Confirme Nueva Contraseña</label>
              <input class="input-text" type="password" name="password2" placeholder="Contraseña" value="<?php echo $password2; ?>">
            </div>

          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>

<?php include "../includes/footer.php";
}
else{
	header('location: token.php?msg=Token Incorrecto');
}
?>
