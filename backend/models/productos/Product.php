<?php

/**
 * Clase de producto
 */
class Producto {

  private const NACIONAL = 1;
  private const INTERNACIONAL = 2;
  private int $id;
  private string $nombre;
  private string $descripcion;
  private bool $esNuevo;
  private int $procedencia;
  private float $precio;
  // private int $stock;

  function __construct(string $nombre, string $descripcion, bool $esNuevo, int $procedencia, float $precio/*, int $stock*/) {
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->esNuevo = $esNuevo;
    $this->procedencia = $procedencia == 1 ? self::NACIONAL : self::INTERNACIONAL;
    $this->precio = $precio;
    // $this->stock = $stock;
  }

  /**
   * Devuelve el id del producto
   * 
   * @return int  El id del producto
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * Setea el nombre del producto
   * 
   * @param string $nombre  El nombre del producto
   */
  public function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuleve el nombre del producto
   * 
   * @return sring  El nombre del producto
   */
  public function getNombre(): string {
    return $this->nombre;
  }

  /**
   * Setea la descripcion del producto
   * 
   * @param string $descripcion  La descripcion del producto
   */
  public function setDescripcion(string $descripcion) {
    $this->descripcion = $descripcion;
  }

  /**
   * Devuelve la descripcion del producto
   * 
   * @return string  La descripcion del producto
   */
  public function getDescripcion(): string {
    return $this->descripcion;
  }

  /**
   * Setea el estado del producto
   * 
   * @param bool $esNuevo  El estado del producto (true = Nuevo)
   */
  public function setEsNuevo(bool $esNuevo) {
    $this->isNuevo = $esNuevo;
  }

  /**
   * Devuelve el estado del producto
   * 
   * @return bool  El estado del producto (true = Nuevo)
   */
  public function esNuevo(): bool {
    return $this->esNuevo;
  }

  /**
   * Setea la procedencia del producto (1=Nacional , 2=Internacional)
   * 
   * @param int $procedencia  La procedencia del producto (1=Nacional , 2=Internacional)
   */
  public function setProcedencia(int $procedencia) {
    $this->procedencia = $procedencia == 1 ? self::NACIONAL : self::INTERNACIONAL;
  }

  /**
   * Devuleve la procedencia del producto
   * 
   * @return string  La procedencia del producto (1=Nacional , 2=Internacional)
   */
  public function getProcedencia(): string {
    return $this->procedencia == self::NACIONAL ? 'Nacional' : 'Internacional';
  }

  /**
   * Setea el precio del producto
   * 
   * @param float $precio  El precio del producto
   */
  public function setPrecio(float $precio): bool {
    if ($precio > 0) {
      $this->precio = $precio;
      return true;
    }
    return false;
  }

  /**
   * Devuelve el precio del producto
   * 
   * @return float  El precio del producto
   */
  public function getPrecio(): float {
    return $this->precio;
  }

  /**
   * Setea el stock del producto
   * 
   * @param int $stock  El stock del producto
   */
  public function setStock(int $stock) {
    $this->stock = $stock;
  }

  /**
   * Devuelve el stock del producto
   * 
   * @return int  El stock del producto
   */
  public function getStock(): int {
    return $this->stock;
  }

  /**
   * Incrementa el stock segun la cantidad pasada
   * 
   * @param int $cantidad  La cantidad para incrementar el stock
   */
  public function incrementarStock(int $cantidad) {
    $this->stock += $cantidad;
  }

  /**
   * Verifica el stock del producto
   * 
   *! @return bool  Si hay stock suficiente o si queda poco stock como advertencia
   */
  public function verificarStock(): bool {
    return true;
  }

  /**
   * Disminuye el stock segun la cantidad pasada
   * 
   * @param int $cantidad  La cantidad para disminuir el stock
   * @return array  Devuelve el estado final del intento de disminuir el stock, si falla retorna el estado y la cantidad de stock faltante
   */
  public function disminuirStock(int $cantidad): array {
    $estado = [];
    $stockInicial = $this->stock;
    $stockFinal = $stockInicial - $cantidad;
    if ($stockFinal >= 0) {
      $this->stock = $stockFinal;
      $estado['estado'] = 'OK';
    }
    $stockFaltante = $stockInicial - $stockFinal;
    $estado['estado'] = 'ERROR';
    $estado['faltante'] = $stockFaltante;
    return $estado;
  }
}
