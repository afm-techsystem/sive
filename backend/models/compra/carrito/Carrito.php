<?php

/**
 * Clase de carrito
 */
class Carrito {
  private int $id;
  private int $idProducto;
  private int $cantidad;
  private float $subTotal;

  function __construct(int $id, int $idProducto, int $cantidad, float $subTotal) {
    $this->id = $id;
    $this->idProducto = $idProducto;
    $this->cantidad = $cantidad;
    $this->subTotal = $subTotal;
  }

  /**
   * Devuelve el id del carrito
   * 
   * @return int  El id del carrito
   */
  function getId(): int {
  }

  /**
   * Devuelve el id del producto
   * 
   * @return int  El id del producto
   */
  function getIdProducto(): int {
  }

  /**
   * Devuelve la cantidad del producto
   * 
   * @return int  La cantidad del producto
   */
  function getCantidad(): int {
  }

  /**
   * Devuelve el subtotal del producto
   * 
   * @return float  El subtotal del producto
   */
  function getSubTotal(): float {
  }

  /**
   * Agrega el producto al carrito
   * 
   * @return Producto|null  El producto agregado o null en caso de falla
   */
  function agregarProductoCarrito(): ?Producto {
    return null;
  }

  /**
   * Actualizar la cantidad del producto
   * 
   * @return bool  Devuelve true en caso de poder actualizar la cantidad el producto
   */
  function actualizarCantidadProducto(): bool {
  }

  /**
   * Eliminar el producto del carrito
   * 
   * @return Producto|null  El producto eliminado o null en caso de falla
   */
  function eliminarProductoCarrito(): ?Producto {
    return null;
  }

  /**
   * Listar todos los productos del carrito
   * 
   * @return array  La lista de productos en el carrito
   */
  function verProductosCarrito(): array {
  }

  /**
   * Iniciar el proceso de la compra del carrito
   * 
   * @return Compra|null  La compra realizada o null en caso de falla
   */
  function checkOut(): ?Compra {
    return null;
  }
}
