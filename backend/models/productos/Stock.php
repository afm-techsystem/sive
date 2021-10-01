<?php

/**
 * Clase de stock
 */
class Stock {
  private int $stockInicial;
  private int $stockFinal;

  function __construct(int $stockInicial) {
    $this->stockInicial = $stockInicial;
  }

  /**
   * G
   * 
   * @return int
   */
  function getStock(): int {
    return ($this->stockInicial - $this->stockFinal);
  }

  /**
   * G
   */
  function setStockAlertaUltimo() {
  }
}
