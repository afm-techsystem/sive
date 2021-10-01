<div class="col">
  <!-- tarjeta del producto -->
  <div class="card border-2 border-warning mb-3" style="max-width: 20rem;">

    <!-- este input hidden es para pasarle a la carta el id del producto para hacer click en el titulo y que lleve al usuario a la pagina del producto -->
    <!-- <input type="hidden" name="id" value="id"> -->

    <div class="position-box">
      <img src="https://picsum.photos/200/200" alt="Imagen del producto" class="card-img-top">
      <div class="card-img-overlay">
        <h4><span class="badge rounded-pill bg-success">NEW</span></h4>
        <div class="position-price">
          <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ 6666</span></h3>
        </div>
        <div class="position-button">
          <button class="btn btn-danger"><i class="fas fa-cart-plus"></i></button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <h4 class="card-title"><a href="#">Titulo del producto</a></h4>
      <p class="card-text">Breve descripcion del producto, lorem ipsum, lorem ipsum, lorem ipsum.</p>
    </div>
  </div>
</div>