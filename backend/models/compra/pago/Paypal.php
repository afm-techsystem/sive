<?php

include_once './MetodoPago.php';

/**
 * Clase de paypal
 */
class Paypal extends MetodoPago {
  private int $id;

  function __construct(int $id) {
    $this->id = $id;
  }

  /**
   * Devuelve el id de paypal
   * 
   * @return int  El id de paypal
   */
  function getId(): int {
    return $this->id;
  }
}
