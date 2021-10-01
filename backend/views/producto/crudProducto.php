<?php include_once '../../config.php'; ?>

<?php
include ROOT_DIR."/views/partials/head.php";
?>

<?php
include ROOT_DIR."/views/partials/barraNavegacion.php";
?>

<!-- CAMINO PARA NAVEGAR MAS FACILMENTE -->
<nav class="container p-3" style="--bs-breadcrumb-divider: ' | ';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    <!-- <li class="breadcrumb-item"><a href="#">Library</a></li> -->
    <!-- <li class="breadcrumb-item">Data</li> -->
  </ol>
</nav>

<h1>Gestion de Productos</h1>

<div class="container">
  <div class="row">
    <div class="col-5">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <p>Ingreso de productos</p>
          </div>
          <form action="#" method="post" class="">
            <div class="form-group mb-2">
              <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del producto" required
                autofocus>
            </div>
            <div class="form-group mb-2">
              <input type="text" name="description" id="description" class="form-control"
                placeholder="Descripcion del producto" required>
            </div>
            <div class="form-group mb-2">
              <label for="price">Precio</label>
              <input type="number" name="price" id="price" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar producto</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-7">
      <table class="table table-strip">
        <thead>
          <th>ID</th>
          <th>Nombre</th>
          <th>Stock</th>
          <th>Precio</th>
          <!-- <th>???</th> -->
          <th>Acciones</th>
        </thead>
        <tbody>
          <tr>
            <th>1</th>
            <td>Lentes ESPIAS</td>
            <td>500</td>
            <td>$15555</td>
            <!-- <td>???</td> -->
            <td>
              <div class="d-flex justify-content-around">
                <button class="btn btn-info"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

<?php
include ROOT_DIR."/views/partials/footer.php";
?>
