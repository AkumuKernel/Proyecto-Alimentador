<?php include "includes/header.php";?>

    <section class="hero">
        <div class="content-hero">

        <h2>Bienvenido a la pagina principal</h2>

        <p>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="88" height="88" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <circle cx="12" cy="11" r="3" />
          <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
          </svg>
        Santiago, Chile</p>

        <a class="button" href="#">Registrate</a>

      </div>
    </section>


    <main class="container shadow">
      <h2>Servicios disponibles</h2>

        <div class="services">
          <section class="service">
            <h3>Monitoreo</h3>
            <div class="icons">

            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-rate-monitor" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
			  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			  <rect x="3" y="4" width="18" height="12" rx="1" />
			  <path d="M7 20h10" />
			  <path d="M9 16v4" />
			  <path d="M15 16v4" />
			  <path d="M7 10h2l2 3l2 -6l1 3h3" />
			</svg></a>
          </div>
          </section>

          <section class="service">
            <h3>Ingreso de tipo de animal</h3>
            <div class="icons">

            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
			  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			  <circle cx="10" cy="10" r="7" />
			  <line x1="21" y1="21" x2="15" y2="15" />
			</svg></a>
          </div>
          </section>

          <section class="service">
            <h3>Generar excel con la data</h3>
            <div class="icons">

            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-export" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
			  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
				<ellipse cx="12" cy="6" rx="8" ry="3" />
			  <path d="M4 6v6c0 1.657 3.582 3 8 3a19.84 19.84 0 0 0 3.302 -.267m4.698 -2.733v-6" />
			  <path d="M4 12v6c0 1.599 3.335 2.905 7.538 2.995m8.462 -6.995v-2m-6 7h7m-3 -3l3 3l-3 3" />
			</svg></a>
          </div>
          </section>
        </div>


    <section>
      <h2>Consulta Datos</h2>

      <form class="formulary" action="/" method="post">

        <fieldset>

          <legend>Consulte sus datos llenando los campos</legend>

            <div class="container-fieldset">

            <div class="fieldset">
              <label for="">Nombre</label>
              <input class="input-text" type="text" name="name" placeholder="Tu nombre">
            </div>

            <div class="fieldset">
              <label for="">Telefono</label>
              <input class="input-text" type="tel" name="" placeholder="+569XXXXXXXX">
            </div>

            <div class="fieldset">
              <label for="">Correo</label>
              <input class="input-text" type="mail" name="" placeholder="correo@correo.com">
            </div>

            <div class="fieldset">
              <label for="">Consulta</label>
              <textarea class="input-text" name="comment"></textarea>
            </div>
          </div>

          <div class="submit w-100 align-right flex">
            <input class="button" type="submit" name="" value="Enviar">
          </div>

        </fieldset>

      </form>

    </section>
  </main>

<?php include "includes/footer.php";
