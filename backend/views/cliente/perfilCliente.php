<?php include_once '../../config.php'; ?>

<?php
require ROOT_DIR . "/views/partials/head.php";
?>

<?php
require ROOT_DIR . "/views/partials/barraNavegacion.php";
?>

<?php
session_start();
if (isset($_SESSION['mail'])) {
  echo "<h2>Hola " . $_SESSION['nombre']." ".$_SESSION['apellido']."</h2>";
} else {
  echo "<h2>Hola desconocido</h2>";
}
?>

<main class="container mb-5">

  <a href="/controllers/logout.controller.php">LogOut</a>
  <h1 class="text-center mb-3">Perfil del cliente</h1>

  <div class="card mx-auto" style="max-width: 36rem;">
    <form id="perfil" action="/controllers/cliente.controller.php" method="post" class="m-3">

      <div class="row">
        <!-- NOMBRE -->
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" class="form-control"
                aria-label="Campo deshabilitado" disabled>
              <label for="nombre">Nombre</label>
            </div>
          </div>
        </div>

        <!-- APELLIDO -->
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" class="form-control"
                aria-label="Campo deshabilitado" disabled>
              <label for="apellido">Apellido</label>
            </div>
          </div>
        </div>

      </div>

      <!-- CELULAR -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="celular" id="celular" placeholder="Ingrese su celular" class="form-control">
              <label for="celular">Celular</label>
              <small class="form-text text-muted d-none">Solo se aceptan números.</small>
            </div>
          </div>
        </div>

        <!-- DOCUMENTO -->
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="documento" id="documento" minlength="7" maxlength="8"
                placeholder="Ingrese su documento" class="form-control">
              <!-- 
                cuando lo tenga ingresado poner al input esto
                 aria-label="Campo deshabilitado" disabled
              -->
              <label for="documento">Documento</label>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="row">
        
      </div> -->

      <!-- EMAIL -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="email" name="mail" id="mail" placeholder="Ingrese su email" class="form-control"
                aria-label="Campo deshabilitado" disabled>
              <label for="mail">Email</label>
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
                class="form-control">
              <label for="pass">Contraseña</label>
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
                class="form-control">
              <label for="repass">Confirme su contraseña</label>
            </div>
          </div>
        </div>
      </div>

      <!-- DEPARTAMENTO -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <select name="departamento" id="departamento" class="form-control">
                <option value="artigas">Artigas</option>
                <option value="canelones">Canelones</option>
                <option value="cerroLargo">Cerro Largo</option>
                <option value="colonia">Colonia</option>
                <option value="durazno">Durazno</option>
                <option value="flores">Flores</option>
                <option value="florida">Florida</option>
                <option value="lavalleja">Lavalleja</option>
                <option value="maldonado">Maldonado</option>
                <option value="montevideo">Montevideo</option>
                <option value="paysandu">Paysandú</option>
                <option value="rioNegro">Río Negro</option>
                <option value="rivera">Rivera</option>
                <option value="rocha">Rocha</option>
                <option value="salto">Salto</option>
                <option value="sanJose">San José</option>
                <option value="soriano">Soriano</option>
                <option value="tacuarembo">Tacuarembó</option>
                <option value="treintaYtres">Treinta y Tres</option>
              </select>
              <label for="departamento">Departamento</label>
            </div>
          </div>
        </div>
      </div>

      <!-- DIRECCION -->
      <div class="row">
        <div class="col">
          <div class="form-group">
            <div class="form-floating m-3">
              <input type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion"
                class="form-control">
              <label for="direccion">Dirección</label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group d-flex justify-content-center">
        <button type="submit" id="btnUpdatePerson" class="btn btn-primary w-50 mt-3">Guardar</button>
      </div>
    </form>
  </div>
</main>

<?php
require ROOT_DIR . "/views/partials/footer.php";
?>
