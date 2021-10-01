<?php include_once 'config.php'; ?>
<?php
include ROOT_DIR."/views/partials/head.php";
?>

<?php
include ROOT_DIR."/views/partials/barraNavegacion.php";
?>

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

<section id="vendedor">
  <a href="/views/producto/crudProducto.php">Gestion de productos</a>
</section>

<!-- SECCION DE CARRUSEL DE OFERTAS -->
<!-- ! cambiar por un slider -->
<section id="ofertas" class="container mb-3">
  <!-- CAROUSEL -->
  <div id="carouselOfertas" class="carousel slide" data-bs-ride="carousel">
    <!-- INDICADORES DEL CAROUSEL -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselOfertas" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselOfertas" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselOfertas" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <!-- CONTENIDO DEL CAROUSEL -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assets/images/product--3891591_1280.jpg" class="d-block w-100" alt="reloj" style="height: 20rem;">
        <div class="carousel-caption d-none d-md-block">
          <h5>Reloj ETERNO</h5>
          <p>No la dejes pasar</p>
          <a href="/views/producto/paginaProducto.php" class="btn btn-primary">Comprar</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/images/product-5222394_1280.jpg" class="d-block w-100" alt="camara" style="height: 20rem;">
        <div class="carousel-caption d-none d-md-block">
          <h5>Camara TOTAL</h5>
          <p>No la dejes pasar</p>
          <a href="/views/producto/paginaProducto.php" class="btn btn-primary">Comprar</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/images/product-5222398_1280.jpg" class="d-block w-100" alt="lentes" style="height: 20rem;">
        <div class="carousel-caption d-none d-md-block">
          <h5>Lentes ESPIAS</h5>
          <p>No la dejes pasar</p>
          <a href="/views/producto/paginaProducto.php" class="btn btn-primary">Comprar</a>
        </div>
      </div>
    </div>
    <!-- BOTON PREVIO -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselOfertas" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <!-- BOTON PROXIMO -->
    <button class="carousel-control-next" type="button" data-bs-target="#carouselOfertas" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<!-- SECCION PRODUCTOS DESTACADOS -->
<section id="destacados" class="container mt-3 mb-3">
  <h3 class="text-center">DESTACADOS</h3>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

    <!-- tarjeta del producto -->
    <!--  style="height: 20rem;" -->
    <div class="col">
      <div class="card border-2 border-warning mb-3 mx-auto" style="max-width: 20rem; height: 25rem;">
        <div class="position-box">
          <img src="/assets/images/product--3891591_1280.jpg" alt="reloj" class="card-img-top">
          <div class="card-img-overlay">
            <h4><span class="badge rounded-pill bg-success">NEW</span></h4>
            <div class="position-price">
              <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ 15555</span></h3>
            </div>
            <div class="position-button">
              <button class="btn btn-danger"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="/views/producto/paginaProducto.php">Reloj ETERNO</a></h4>
          <p class="card-text">Excelente reloj que dura toda la vida, y no tiene engranajes.</p>
        </div>
      </div>
    </div>

    <!-- tarjeta del producto -->
    <div class="col">
      <div class="card border-2 border-warning mb-3 mx-auto" style="max-width: 20rem; height: 25rem;">
        <div class="position-box">
          <img src="/assets/images/product-5222394_1280.jpg" alt="camara" class="card-img-top">
          <div class="card-img-overlay">
            <!-- <h4><span class="badge rounded-pill bg-success">NEW</span></h4> -->
            <div class="position-price">
              <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ 15555</span></h3>
            </div>
            <div class="position-button">
              <button class="btn btn-danger"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="/views/producto/paginaProducto.php">Camara TOTAL</a></h4>
          <p class="card-text">Camara especial que toma fotos bajo el agua, sobre el agua, y se ha probado bajo la lava.
          </p>
        </div>
      </div>
    </div>

    <!-- tarjeta del producto -->
    <div class="col">
      <div class="card border-2 border-warning mb-3 mx-auto" style="max-width: 20rem; height: 25rem;">
        <div class="position-box">
          <img src="/assets/images/product-5222398_1280.jpg" alt="lentes" class="card-img-top">
          <div class="card-img-overlay">
            <h4><span class="badge rounded-pill bg-success">NEW</span></h4>
            <div class="position-price">
              <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ 15555</span></h3>
            </div>
            <div class="position-button">
              <button class="btn btn-danger"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="/views/producto/paginaProducto.php">Lentes ESPIAS</a></h4>
          <p class="card-text">Lentes de sol, muy buen estilo y materiales; y si, si tiene rayos X.</p>
        </div>
      </div>
    </div>

    <!-- tarjeta del producto -->
    <div class="col">
      <div class="card border-2 border-warning mb-3 mx-auto" style="max-width: 20rem; height: 25rem;">
        <div class="position-box">
          <img src="/assets/images/product-5226389_1280.jpg" alt="cuchillas" class="card-img-top">
          <div class="card-img-overlay">
            <h4><span class="badge rounded-pill bg-success">NEW</span></h4>
            <div class="position-price">
              <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ 15555</span></h3>
            </div>
            <div class="position-button">
              <button class="btn btn-danger"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="/views/producto/paginaProducto.php">Cuchillas Nordica</a></h4>
          <p class="card-text">Cuchilla curva para corte de aromaticas, y alguna cosa mas; forjada en la mismisima forja
            de los enanos sindri y su hermano Brokk.</p>
        </div>
      </div>
    </div>


    <!-- tarjeta del producto -->
    <div class="col">
      <div class="card border-2 border-warning mb-3 mx-auto" style="max-width: 20rem; height: 25rem;">
        <div class="position-box">
          <img src="/assets/images/product-958804_1280.jpg" alt="zapatos" class="card-img-top">
          <div class="card-img-overlay">
            <h4><span class="badge rounded-pill bg-success">NEW</span></h4>
            <div class="position-price">
              <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ 15555</span></h3>
            </div>
            <div class="position-button">
              <button class="btn btn-danger"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="/views/producto/paginaProducto.php">Zapatos Acuaticos</a></h4>
          <p class="card-text">Zapatos anti-humedad y agua, jesus usaba un par de estos cuando camino sobre el agua.</p>
        </div>
      </div>
    </div>


  </div>

  <div class="d-flex justify-content-end">
    <a class="btn btn-primary" href="/views/producto/listadoProductos.php">Ver todos los produtos --></a>
  </div>
</section>

<!-- SECCION CATEGORIAS DE PRODUCTOS -->
<!-- <section id="categorias">
  <h3>Categorias</h3>
  <ul class="navbar-nav">
    <div class="row justify-content-around m-2">
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Cocina"></img>
          </a>
        </li>
      </div>
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Vestimenta"></img>
          </a>
        </li>
      </div>
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Baño"></img>
          </a>
        </li>
      </div>
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Living"></img>
          </a>
        </li>
      </div>
    </div>
    <div class="row justify-content-around m-2">
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Comedor"></img>
          </a>
        </li>
      </div>
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Dormitorio"></img>
          </a>
        </li>
      </div>
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Jardin"></img>
          </a>
        </li>
      </div>
      <div class="col-2">
        <li>
          <a href=""><img src="https://via.placeholder.com/45" alt="Otros"></img>
          </a>
        </li>
      </div>
    </div>
  </ul>
</section> -->

<!-- SECCION LISTADO DE PRODUCTOS -->
<!-- <section id="productos">
  <h2>Lista de productos</h2>
  <div class="catalogo-productos">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card border-dark">
          <img src="https://via.placeholder.com/40" alt="Imagen del producto" class="card-img-top">
          <div class="card-body">
            <h4 class="card-title">Titulo</h4>
            <p class="card-text">Descripcion</p>
            <p class="card-text">$ Precio</p>
            <a href="#" class="btn btn-success">Agregar al Carrito</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card bg-dark text-white">
          <img src="https://via.placeholder.com/40" alt="Imagen del producto" class="card-img">
          <div class="card-img-overlay">
            <h4 class="card-title">Titulo</h4>
            <p class="card-text">Descripcion</p>
            <p class="card-text">$ Precio</p>
            <a href="#" class="btn btn-success">Agregar al Carrito</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<?php
include ROOT_DIR."/views/partials/footer.php";
?>
