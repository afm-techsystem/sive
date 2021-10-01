<?php
include_once '../config.php';
require ROOT_DIR . "/views/partials/head.php";
require ROOT_DIR . "/views/partials/barraNavegacion.php";
?>

<main class="container mb-5">

  <div class="card mx-auto" style="max-width: 26rem;">

    <div class="row m-3">
      <div class="col">
        <img src="/assets/images/logo.png" alt="IMAGEN" width="80px" class="d-block mx-auto">
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h2 class="text-center text-muted mt-2">SIVE</h2>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <form id="loginForm" action="/controllers/login.controller.php" method="post" class="m-3">

          <!-- INPUT MAIL -->
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="email" name="mail" id="mail" placeholder="Ingrese su email" class="form-control" required>
              <label for="mail">Email</label>
              <small class="form-text text-muted d-none">No tiene el formato adecuado.</small>
            </div>
          </div>

          <!-- INPUT PASS -->
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="password" name="pass" id="pass" minlength="4" placeholder="Ingrese su contraseña"
                class="form-control" required>
              <label for="pass">Contraseña</label>
            </div>
          </div>

          <!-- BOTON INGRESAR -->
          <div class="form-group d-flex justify-content-center">
            <button type="submit" id="btnSubmitLogin" class="btn btn-primary w-50 mt-3">Ingresar</button>
          </div>
        </form>
      </div>
    </div>

  </div>

</main>

<script>
$(document).ready(() => {
  let intentos = 0;

  $('#mail').on('blur', e => {
    const mail = e.taget.val();
    if (verificarEmail(mail)) {
      e.target.parentElement.querySelector('small').classList.add('d-none');
    } else {
      e.target.parentElement.querySelector('small').classList.remove('d-none');
    }
  });

  $('#loginForm').on('submit', e => {
    e.preventDefault();
    const email = $('#mail').val().trim();
    const pass = $('#pass').val().trim();
    if (!verificarReglasPassword(pass)) {
      intentos++;
      alert('Usuario y/o contraseña inválidas.');
    }

    enviarFormualrio(email, pass);

  });

});


/**
 * Funcion para verificar las reglas de la contraseña
 * 
 * @param string  El password ingresado
 * @return  Devuelve si la contraseña cumple las reglas o no
 */
function verificarReglasPassword(pass) {
  const PASS_REGEX = /^[A-Za-z]{4,}$/mg;
  // const PASS_REGEX = /^(?=(?:.*[a-z]){1,})(?=(?:.*[A-Z]){1,})(?=(?:.*[0-9]){1,})(?=(?:.*[*#$%&!]){1,})[A-Za-z0-9*#$%&!]{8,}$/mg;
  return PASS_REGEX.test(pass);
}

/**
 * Funcion para verificar un correo electronico
 * 
 * @param string  El email ingresado
 * @return  Devuelve si el mail es valido o no
 */
function verificarEmail(mail) {
  const EMAIL_REGEX = /^([a-z0-9]+(?:[._-][a-z0-9]+)*)@([a-z0-9]+(?:[.-][a-z0-9]+)*\.[a-z]{2,})$/i;
  return EMAIL_REGEX.test(mail);
}

function enviarFormualrio(email, pass) {
  let params = {
    mail: email,
    password: pass
  };
  // Metodo AJAX para enviar un request al servidor
  $.ajax({
    url: '/controllers/login.controller.php', // a donde manda el request
    data: params, // los datos para enviar
    type: 'POST', // el metodo HTTP para el envio
    datatype: 'json', // el tipo de datos que espera en la respuesta puede ser html tambien
  }).done(res => {
    // lo que ejecuta cuando obtiene la respuesta(res) del servidor
    alert('Consulta terminada con exito');

  }).fail((xhr, status, errotThrown) => {
    // lo que ejecuta cuando falla, recibe el request(xhr), el estado(status), y el error(errorThrown)
    alert('Consulta fallida');

  }).always((xhr, status) => {
    // lo que ejecuta cuando termina el request, no importa si fue con exito o con falla, recibe el request(xhr) y el estado(state)
    alert('Consulta terminada, con o sin exito ${state}');

  });
}
</script>

<?php
require ROOT_DIR . "/views/partials/footer.php";
?>
