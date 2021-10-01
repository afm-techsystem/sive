<?php 

/**
 * Clase de metodos de pago
 */
abstract class MetodoPago {
  private int $id;
  private string $nombre;

  function __construct(int $id, string $nombre) {
    $this->id = $id;
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el id del metodo de pago
   * 
   * @return int  El id del metodo de pago
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Devuelve del nombre del metodo de pago
   * 
   * @return string  El nombre del metodo de pago
   */
  function getNombre(): string {
    return $this->nombre;
  }
}
