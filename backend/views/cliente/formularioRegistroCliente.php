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
  ('#celular').addEventListener('blur', e => soloNumeros(e));
  ('#documento').addEventListener('blur', e => soloNumeros(e));
  ('#mail').addEventListener('blur', e => verificarEmail(e));
  ('#pass').addEventListener('blur', e => complejidadPassword(e));
  ('#signupForm').addEventListener('submit', e => envio(e));
});

function envio(e) {
  e.preventDefault();
  const celular = e.querySelector('').val().trim();
  const documento = e.querySelector('').val().trim();
  const mail = e.querySelector('').val().trim();
  const pass = e.querySelector('').val().trim();

  if (soloNumeros(celular) && soloNumeros(documento) && verificarEmail(mail) && complejidadPassword(pass) &&
    verificarRePass(pass)) {
    e.submit();
  } else {
    alert('Ocurrio un error. Por favor revise los datos.');
  }
}

function soloNumeros(e) {
  const SOLO_NUMEROS = /^[0-9]+$/;

  let texto = e.target.value;

  if (SOLO_NUMEROS.test(texto)) {
    e.target.parentElement.querySelector('small').classList.add('d-none');
    return true;
  } else {
    e.target.parentElement.querySelector('small').classList.remove('d-none');
    return false;
  }
}

function verificarEmail(e) {
  const EMAIL_REGEX = /^([a-z0-9]+(?:[._-][a-z0-9]+)*)@([a-z0-9]+(?:[.-][a-z0-9]+)*\.[a-z]{2,})$/i;

  let mail = e.target.value;

  if (EMAIL_REGEX.test(mail)) {
    e.target.parentElement.querySelector('small').classList.add('d-none');
    return true;
  } else {
    e.target.parentElement.querySelector('small').classList.remove('d-none');
    return false;
  }
}

function complejidadPassword(e) {
  const PASS_COMPLEX_REGEX = /^[A-Za-z]{4,}$/mg;
  // const PASS_COMPLEX_REGEX = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,18}$/gm;
  // debe contener 1 numero(0-9) + 1 mayuscula + 1 minuscula + 1 simbolo + 8-16 caracteres sin espacios

  let pass = e.target.value;

  if (PASS_COMPLEX_REGEX.test(pass)) {
    e.target.parentElement.querySelector('small').classList.add('d-none');
    return true;
  } else {
    e.target.parentElement.querySelector('small').classList.remove('d-none');
    return false;
  }
}

function verificarRePass(e) {
  e.preventDefault();
  pass = e.target.querySelector('#pass').value;
  repass = e.target.querySelector('#repass').value;

  if (pass == repass) {
    return true;
  } else {
    alert('Las contraseñas no coinciden');
    return false;
  }
}
</script>
