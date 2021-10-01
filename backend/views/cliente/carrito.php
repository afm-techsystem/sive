<?php include_once '../../config.php'; ?>

<?php
require ROOT_DIR."/views/partials/head.php";
?>
<?php
require ROOT_DIR."/views/partials/barraNavegacion.php";
?>


<main class="container p-3">
  <h1 class="text-center mb-4">Carrito de compras</h1>

  <section class="container">

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Articulo</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio Unitario</th>
          <th scope="col">Precio x Cantidad</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Cerveza IPA 500ml</th>
          <td>
            <input type="number" name="cantidad1" id="cantidad1" min="1" value="2" style="width: 60px;">
          </td>
          <td>
            <p>$ 150</p>
          </td>
          <td>
            <p>$ 300</p>
          </td>
          <td>
            <button class="btn btn-danger">Eliminar</button>
          </td>
        </tr>
        <tr>
          <th scope="row">Yerba Baldo 1Kg</th>
          <td>
            <!-- poner el id en el name e id para que sea distinto siempre ??? -->
            <input type="number" name="cantidad2" id="cantidad2" min="1" value="1" style="width: 60px;">
          </td>
          <td>
            <p>$ 189</p>
          </td>
          <td>
            <p>$ 189</p>
          </td>
          <td>
            <button class="btn btn-danger">Eliminar</button>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">
            <p class="text-end">Total: $ 489</p>
          </th>
        </tr>
      </tfoot>
    </table>

  </section>
</main>

<?php
require ROOT_DIR."/views/partials/footer.php";
?>
