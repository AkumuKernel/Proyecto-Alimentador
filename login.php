<?php include "includes/header.php"; ?>
    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="logged.php" method="post">
        <fieldset>

          <legend>Ingrese sus datos</legend>

            <div class="fieldset">
              <label for="">Usuario</label>
              <input class="input-text" type="text" name="username" placeholder="Username">
            </div>

            <div class="fieldset">
              <label for="">Constraseña</label>
              <input class="input-text" type="password" name="password" placeholder="******">
            </div>


          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>
<?php include "includes/footer.php"; ?>
 
