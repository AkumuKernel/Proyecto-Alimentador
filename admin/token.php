<?php include "../includes/header.php"; ?>
    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="modificador.php" method="post">
        <fieldset>

          <legend>Ingrese el token de usuario a modificar</legend>

            <div class="fieldset">
              <label for="">Token</label>
              <input class="input-text" type="text" name="token" placeholder="Token">
            </div>


          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>
<?php include "../includes/footer.php"; ?>
