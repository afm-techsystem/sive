/**
 * ? Se puede utilizar este js como main e importar desde aca los otros modulos donde estaran las funciones necesarias ?????
 */
import { agregarTarjeta } from './tarjetasProductos.js';

const carrito = [];

const demoproducts = [
  {
    id: 1,
    titulo: 'Reloj ETERNO',
    descripcion: 'Excelente reloj que dura toda la vida, y no tiene engranajes.',
    precio: 150000,
    nuevo: true,
    imagen: '/assets/images/product--3891591_1280.jpg',
    alt: 'reloj',
    link: '/pages/producto/paginaProducto.html'
  },
  {
    id: 2,
    titulo: 'Camara TOTAL',
    descripcion: 'Camara especial que toma fotos bajo el agua, sobre el agua, y se ha probado bajo la lava.',
    precio: 120000,
    nuevo: false,
    imagen: '/assets/images/product-5222394_1280.jpg',
    alt: 'camara',
    link: '/pages/producto/paginaProducto.html'
  },
  {
    id: 3,
    titulo: 'Lentes ESPIAS',
    descripcion: 'Lentes de sol, muy buen estilo y materiales; y si, si tiene rayos X.',
    precio: 58000,
    nuevo: false,
    imagen: '/assets/images/product-5222398_1280.jpg',
    alt: 'lentes',
    link: '/pages/producto/paginaProducto.html'
  },
  {
    id: 4,
    titulo: 'Cuchillas Nordica',
    descripcion: 'Cuchilla curva para corte de aromaticas, y alguna cosa mas; forjada en la mismisima forja de los enanos sindri y su hermano Brokk.',
    precio: 143000,
    nuevo: true,
    imagen: '/assets/images/product-5226389_1280.jpg',
    alt: 'cuchillas',
    link: '/pages/producto/paginaProducto.html'
  },
  {
    id: 5,
    titulo: 'Zapatos Acuaticos',
    descripcion: 'Zapatos anti-humedad y agua, jesus usaba un par de estos cuando camino sobre el agua.',
    precio: 38000,
    nuevo: false,
    imagen: '/assets/images/product-958804_1280.jpg',
    alt: 'zapatos',
    link: '/pages/producto/paginaProducto.html'
  },    
  {
    id: 6,
    titulo: 'Chispas del Ave Fenix',
    descripcion: 'Luego de tanto ardor, se logro tomar algunas chispas de la mismisima Ave Fenix, abrir en lugares abierto y ventilados.',
    precio: 250000,
    nuevo: true,
    imagen: '/assets/images/worker-cuts-metal-4384343_1920.jpg',
    alt: 'chispas',
    link: '/pages/producto/paginaProducto.html'
  }
];

const products = [...demoproducts];

$(document).ready( () => {

  products.forEach(producto => {
    agregarTarjeta(producto, $('#listaDestacados'));
  });
  
  $('.btn-cart').map( elem => elem.addEventListener('click', agregarAlCarrito) );

});

function agregarAlCarrito(id) {
  alert('Bien apretado'+id);
  // carrito.push(producto);
}




// /**
//  * Funcion para mostrar u ocultar el campo de mail o de rut
//  */
// function changeWhoLogin() {
//   InputEmail = $('#inputEmail');
//   InputRut = $('#inputRut');
//   TextWhoLogin = $('#loginCompanyText')

//   if (InputRut.attr('hidden')) {
//     // Ingreso como empresa
//     InputRut.removeAttr('hidden');
//     InputEmail.attr('hidden', true);
//     TextWhoLogin.text('Ingrese como cliente o vendedor -->');
//   } else {
//     // Ingreso como cliente o vendedor
//     InputRut.attr('hidden', true);
//     InputEmail.removeAttr('hidden');
//     TextWhoLogin.text('Ingrese como empresa -->');
//   }
// }
