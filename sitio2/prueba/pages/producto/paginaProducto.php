<?php include("./template/cabecera.php"); ?>

  <!-- !! El menu aparece desplegado revisarlo -->

  <!-- MENU TIPO HAMBURGUESA (faltan agregar mas y ver con php si ya esta logueado o no para cambiar alunos links)-->
  <div class="justify-self-end">
    <!-- EL BOTON QUE MUESTRA U OCULTA EL MENU CUANDO ESTA COLAPSADO -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
      aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- ESTE ES EL MENU EN SI, EL CUAL SE COLAPSARA PARA DISPOSITIVOS MOVILES Y TABLET -->
    <div id="navbarMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/cliente/formularioRegistroCliente.html">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/login.html">Ingresar</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Ofertas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categorias</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="/pages/cliente/carritot.html">Carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/cliente/formularioContacto.html">Contacto</a>
        </li>
      </ul>
    </div>

  </div>
</nav>

<!-- BUSCADOR -->
<section id="buscador" class="container mt-3 mb-3">
  <form class="d-flex mx-auto" style="max-width: 38rem;" action="#">
    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
  </form>
</section>

<!-- CAMINO PARA NAVEGAR MAS FACILMENTE -->
<nav class="container p-3" style="--bs-breadcrumb-divider: ' | ';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    <!-- <li class="breadcrumb-item"><a href="#">Library</a></li> -->
    <!-- <li class="breadcrumb-item">Data</li> -->
  </ol>
</nav>
  <h1>Pagina del producto</h1>
<main class="container mb-4 mt-4">

  <div class="row align-items-center">
    <div class="col-8">
      <img src="./img/product-5222398_1280.jpg" alt="lentes" class="" style="width: 100%;" />
    </div>


    <div class="col-4">

      <div class="row">
        <div class="col">
          <h4 class="text-center">Lentes ESPIAS</h4>
          <p class="">
            Lentes de sol, muy buen estilo y materiales; y si, si tiene rayos X.
          </p>
          <p>Opciones del producto</p>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <hr>
          <button class="btn btn-danger btn-cart"><i class="fas fa-cart-plus"></i> Agregar al carrito</button>
          <h3 class="">$ 15555</h3>
          <p>Envio</p>
        </div>
      </div>

    </div>

  </div>
  
  

  <footer class="bg-warning container-fluid">
    <p class="text-muted text-center">
      | Grupo <strong>AFM Tech System</strong> | Proyecto S.I.V.E. | 2021 |
    </p>
  </footer>

  <!-- SCRIPTS BOOTSTRAP -->
  <script src="/assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
  <!-- SCRIPTS JQUERY -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- SCRIPTS PROPIOS -->
  <script src="/assets/js/main.js"></script>
  <?php include("./template/pie.php"); ?>