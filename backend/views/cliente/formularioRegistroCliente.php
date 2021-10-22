<?php include_once '../../config.php'; ?>

<?php
require ROOT_DIR . "/views/partials/head.php";
?>
<?php
require ROOT_DIR . "/views/partials/barraNavegacion.php";
?>
<main class="container mb-5">
  <h1 class="text-center mb-3">Formulario de registro de clientes</h1>
  <div class="card mx-auto" style="max-width: 36rem;">
    <form id="signupForm" action="/controllers/cliente.controller.php" method="post" class="m-3">
      <p>Ingrese los datos mínimos, le recomendamos luego completar todos sus datos personales en su perfil.</p>

      <div class="row">

        <!-- NOMBRE -->
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" class="form-control"
                required>
              <label for="nombre">Nombre *</label>
            </div>
          </div>
        </div>

        <!-- APELLIDO -->
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" class="form-control"
                required>
              <label for="apellido">Apellido *</label>
            </div>
          </div>
        </div>

      </div>

      <!-- CELULAR -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="celular" id="celular" placeholder="Ingrese su celular" class="form-control"
                required>
              <label for="celular">Celular *</label>
              <small class="form-text text-muted d-none">Solo se aceptan números.</small>
            </div>
          </div>
        </div>
      </div>

      <!-- DOCUMENTO -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="documento" id="documento" minlength="7" maxlength="8"
                placeholder="Ingrese su documento" class="form-control" required>
              <label for="documento">Documento</label>
              <small class="form-text text-muted d-none">Solo se aceptan números.</small>
            </div>
          </div>
        </div>
      </div>

      <!-- FECHA DE NACIMIENTO -->

      <!-- DOMICILIO -->

      <!-- EMAIL -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="email" name="mail" id="mail" placeholder="Ingrese su email" class="form-control" required>
              <label for="mail">Email *</label>
              <small class="form-text text-muted d-none">No tiene el formato adecuado.</small>
            </div>
          </div>
        </div>
      </div>

      <!-- PASSWORD -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="password" name="pass" id="pass" minlength="6" placeholder="Ingrese su contraseña"
                class="form-control" required>
              <label for="pass">Contraseña *</label>
              <small class="form-text text-muted d-none">Debe contener 1 numero(0-9) + 1 mayuscula + 1 minuscula + 1
                simbolo + 8-16 caracteres sin espacios.</small>
            </div>
          </div>
        </div>
      </div>

      <!-- RETYPE PASSWORD -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="password" name="repass" minlength="6" id="repass" placeholder="Confirme su contraseña"
                class="form-control" required>
              <label for="repass">Confirme su contraseña *</label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group d-flex justify-content-center">
        <button type="submit" id="btnSubmitSignupPerson" class="btn btn-primary w-50 mt-3">Registrarse</button>
      </div>
    </form>
  </div>
</main>

<?php
require ROOT_DIR . "/views/partials/footer.php";
?>

<script>
$(document).ready(() => {
  $('#celular').blur(e => soloNumeros(e.target.value));
  $('#documento').blur(e => soloNumeros(e));
  $('#mail').blur(e => verificarEmail(e));
  $('#pass').blur(e => complejidadPassword(e));
  $('#signupForm').submit(function(e) {
    // console.log("el target.value del submit del form: " + e.value);
    if (preEnvio()) {
      // console.log(e);
      console.log("envio exitoso");
    } else {
      console.log("Fallo al preparar el envio");
      e.preventDefault();
    }
  });
});

function preEnvio() {
  const celular = $('#celular');
  const documento = $('#documento');
  const mail = $('#mail');
  const pass = $('#pass');
  const repass = $('#repass');

  // console.log("elemento celular");
  // console.log(celular);

  // console.log("Los valores dentro de envio: ");
  // console.log(celular[0].value);
  // console.log(documento[0].value);
  // console.log(mail[0].value);
  // console.log(pass[0].value);
  // console.log(repass[0].value);

  if (soloNumeros(celular[0].value, celular)) {
    celular[0].parentElement.querySelector('small').classList.add('d-none');
    console.log("celular verificado");
    if (soloNumeros(documento[0].value)) {
      documento[0].parentElement.querySelector('small').classList.add('d-none');
      console.log("documento verificado");
      if (verificarEmail(mail[0].value)) {
        mail[0].parentElement.querySelector('small').classList.add('d-none');
        console.log("email verificado");
        if (complejidadPassword(pass[0].value)) {
          pass[0].parentElement.querySelector('small').classList.add('d-none');
          console.log("complejidad del password verificada");
          if (verificarRepass(pass[0].value, repass[0].value)) {
            // celular[0].parentElement.querySelector('small').classList.add('d-none');
            console.log("preparado para enviar");
            // console.log(e);
            // e.submit();
            return true;
          } else {
            console.log("Error al validar la pass y el repass");
            alert('Las contraseñas no coinciden');
          }
        } else {
          pass.target.parentElement.querySelector('small').classList.remove('d-none');
          console.log("Error al validar la complejidad del pass");
        }
      } else {
        mail.target.parentElement.querySelector('small').classList.remove('d-none');
        console.log("Error al validar la mail");
      }
    } else {
      documento.target.parentElement.querySelector('small').classList.remove('d-none');
      console.log("Error al validar el documento");
    }
  } else {
    celular.target.parentElement.querySelector('small').classList.remove('d-none');
    console.log("Error al validar el celular");
  }
  return false;

}

function soloNumeros(texto, elemento) {
  const SOLO_NUMEROS = /^[0-9]+$/;

  console.log(elemento);

  // const texto = value;
  // console.log("el valor del elemento en soloNumeros: ");
  console.log(texto);
  // return SOLO_NUMEROS.test(texto);
  if (SOLO_NUMEROS.test(texto)) {
    console.log("Dato aprovado");
    elemento.querySelector('small').classList.add('d-none');
    return true;
  } else {
    elemento.querySelector('small').classList.remove('d-none');
    return false;
  }
}

function verificarEmail(mail) {
  const EMAIL_REGEX = /^([a-z0-9]+(?:[._-][a-z0-9]+)*)@([a-z0-9]+(?:[.-][a-z0-9]+)*\.[a-z]{2,})$/i;

  // const mail = value;
  // console.log("el valor del elemento en verificarEmail: ");
  // console.log(mail);
  return EMAIL_REGEX.test(mail);
  // if (EMAIL_REGEX.test(mail)) {
  //   console.log("Email valido");
  //   elemento.target.parentElement.querySelector('small').classList.add('d-none');
  //   return true;
  // } else {
  //   elemento.target.parentElement.querySelector('small').classList.remove('d-none');
  //   return false;
  // }
}

function complejidadPassword(pass) {
  const PASS_COMPLEX_REGEX = /^[A-Za-z]{4,}$/mg;
  // const PASS_COMPLEX_REGEX = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,18}$/gm;
  // debe contener 1 numero(0-9) + 1 mayuscula + 1 minuscula + 1 simbolo + 8-16 caracteres sin espacios

  // const pass = value;
  // console.log("el valor del elemento en complejidadPassword: ");
  // console.log(pass);
  return PASS_COMPLEX_REGEX.test(pass);
  // if (PASS_COMPLEX_REGEX.test(pass)) {
  //   console.log("Complejidad dentro de los parametros");
  //   elemento.target.parentElement.querySelector('small').classList.add('d-none');
  //   return true;
  // } else {
  //   elemento.target.parentElement.querySelector('small').classList.remove('d-none');
  //   return false;
  // }
}

function verificarRepass(password, repassword) {
  // pass = password;
  // repass = repassword;
  // console.log("el valor del elemento del pass en verificarRepass: ");
  // console.log(pass);
  // console.log("el valor del elemento del repass en verificarRepass: ");
  // console.log(repass);

  return password === repassword;
}
</script>
