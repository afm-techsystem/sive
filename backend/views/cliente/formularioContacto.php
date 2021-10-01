<?php include_once '../../config.php'; ?>

<?php
require ROOT_DIR."/views/partials/head.php";
?>
<?php
require ROOT_DIR."/views/partials/barraNavegacion.php";
?>

<main class="container mb-5">
  <h1 class="text-center mb-3">Formulario de contacto</h1>
  <div class="card mx-auto" style="max-width: 26rem;">
    <form id="contactForm" action="#" method="post" class="m-3">

      <div class="form-group">
        <div class="form-floating m-3">
          <input type="text" name="name" id="name" placeholder="Ingrese su nombre" class="form-control" autofocus
            required>
          <label for="name">Nombre</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-floating m-3">
          <input type="email" name="mail" id="mail" placeholder="Ingrese su email" class="form-control" required>
          <label for="mail">Email</label>
        </div>
        <!-- En este input de tipo email, es valido ingresar algo@algo , no es necesario agregar el .algo , esto habria que verlo con JS -->
      </div>
      <div class="form-group">
        <div class="form-floating m-3">
          <textarea name="mensaje" id="mensaje" placeholder="Ingrese su mensaje" class="form-control"
            style="height: 150px;"></textarea>
          <label for="mensaje">Mensaje</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" id="btnSubmitContact" class="btn btn-primary btn-block">Enviar</button>
      </div>
    </form>
  </div>
</main>


<?php
require ROOT_DIR."/views/partials/footer.php";
?>
