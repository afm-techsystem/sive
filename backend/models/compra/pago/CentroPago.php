<?php

include_once './MetodoPago.php';

/**
 * Clase del centro de pafo
 */
class CentroPago extends MetodoPago {
  private int $id;
  private string $sucursal;

  function __construct(int $id, string $sucursal) {
    $this->id = $id;
    $this->sucursal = $sucursal;
  }

  /**
   * Devuelve el id del centro de pago
   * 
   * @return int  El id del centro de pago
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Devuelve la sucursal del centro de pago
   * 
   * @return string  La sucursal del centro de pago
   */
  function getSucursal(): string {
    return $this->sucursal;
  }
}
