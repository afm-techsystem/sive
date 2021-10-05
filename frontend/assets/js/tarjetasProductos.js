
export function agregarTarjeta(producto, contenedor) {
  const { id, titulo, descripcion, precio, imagen, alt, link, nuevo } = producto;
  const alertNuevo = `<h4><span class="badge rounded-pill bg-success">NEW</span></h4>`;
  let tarjeta = `
    <div class="col">
      <div class="card border-2 border-warning mb-3 mx-auto" style="max-width: 20rem; height: 25rem;">
        <div class="position-box">
          <img src="${imagen}" alt="${alt}" class="card-img-top">
          <div class="card-img-overlay">
            ${(nuevo==true) ? alertNuevo : ''}
            <div class="position-price">
              <h3 class="card-text"><span class="badge rounded-pill bg-primary">$ ${precio}</span></h3>
            </div>
            <div class="position-button">
              <button class="btn btn-danger btn-cart" onclick="agregarAlCarrito(${id})"><i class="fas fa-cart-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="${link}">${titulo}</a></h4>
          <p class="card-text">${descripcion}</p>
        </div>
      </div>
    </div>
  `;
  contenedor.append(tarjeta);
}
