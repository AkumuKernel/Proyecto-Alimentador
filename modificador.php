<?php include "includes/header.php"; ?>

    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="modificar.php" method="post">
        <fieldset>

          <legend>Ingrese sus datos</legend>

            <div class="fieldset">
              <label for="nombre">Usuario</label>
              <input class="input-text" type="text" name="username" placeholder="Username" value="<?php echo $_SESSION["username"]["name"]; ?>">
            </div>

            <div class="fieldset">
              <label for="email">Email</label>
              <input class="input-text" type="mail" name="email" value="<?php echo $_SESSION["username"]["email"]; ?>">
            </div>
			
			<div class="fieldset">
              <label for="contraseña">Contraseña Actual</label>
              <input class="input-text" type="password" name="password" placeholder="Contraseña" value="<?php echo $password; ?>">
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

<?php include "includes/footer.php"; ?>
