<?php include "../includes/header.php"; ?>

    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="registrador.php" method="post">
        <fieldset>

          <legend>Ingrese sus datos</legend>

            <div class="fieldset">
              <label for="nombre">Usuario</label>
              <input class="input-text" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
            </div>

            <div class="fieldset">
              <label for="contraseña">Contraseña</label>
              <input class="input-text" type="password" name="password" placeholder="Contraseña" value="<?php echo $password; ?>">
            </div>
            
            <div class="fieldset">
              <label for="">Ingrese el Token</label>
              <input class="input-text" type="password" name="token" placeholder="Ingrese el Token obtenido" <?php echo $token; ?>>
            </div>

          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>

<?php include "includes/footer.php"; ?>
