<?php include "includes/header.php"; ?>
    <main>
    <?php if(isset($_GET["msg"])){ ?>  <center class="failure"><?php  echo $_GET["msg"]?></center><?php } ?>
      <form class="formulary margin" action="editar.php" method="post">
        <fieldset>

          <legend>Ingrese los datos de su mascota</legend>

            <div class="fieldset">
              <label for="">Tipo de animal</label>
              <input class="input-text" type="text" name="pet" placeholder="Animal">
            </div>

            <div class="fieldset">
              <label for="">Peso</label>
              <input class="input-text" type="text" name="weight" placeholder="60">
            </div>


          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>
      </form>
    </main>
<?php include "includes/footer.php"; ?>
