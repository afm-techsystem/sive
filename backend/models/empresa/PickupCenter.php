<?php

/**
 * Clase de pickup center
 */
class PickupCenter {
  private int $id;
  private string $direccion;
  private int $stockId;

  function __construct(int $id, string $direccion, int $stockId) {
    $this->id = $id;
    $this->direccion = $direccion;
    $this->stockId = $stockId;
  }

  /**
   * Devuelve el id del pickup center
   * 
   * @return int  El id del pickup center
   */
  function getId(): int {
  }

  /**
   * Setea la direccion del pickup center
   * 
   * @param string $direccion  La direccion del pickup center
   */
  function setDireccion(string $direccion) {
  }

  /**
   * Devuelve la direccion del pickup center
   * 
   * @return string  La direccion del pickup center
   */
  function getDireccion(): string {
  }

  /**
   * Setea el stock en el pickup center
   * 
   * @param int $stock  El stock del pickup center
   */
  function setStock(int $stock) {
  }

  /**
   * Devuelve el stock en el pickup center
   * 
   * @return int  El stock del pickup center
   */
  function getStock(): int {
  }
}
