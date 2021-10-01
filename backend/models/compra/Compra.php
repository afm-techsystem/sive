<?php 

/**
 * Clase de compra
 */
class Compra {
  private int $id;
  private DateTime $fechaCompra;
  private DateTime $fechaPago;
  private float $total;
  private string $statusPago;

  function __construct(int $id, DateTime $fechaCompra, DateTime $fechaPago, float $total, string $statusPago) {
    $this->id = $id;
    $this->fechaCompra = $fechaCompra;
    $this->fechaPago = $fechaPago;
    $this->total = $total;
    $this->statusPago = $statusPago;
  }

  /**
   * Devuelve el id de la compra
   * 
   * @return int  El id de la compra
   */
  function getId(): int {}

  /**
   * Devuelve el total de la compra
   * 
   * @return float  El total de la compra
   */
  function getTotal(): float {
  }

  /**
   * Devuelve la fecha de la compra
   * 
   * @return DateTime  La fecha de la compra
   */
  function getFechaCompra(): DateTime {
  }

  /**
   * Devuelve la fecha del pago de la compra
   * 
   * @return DateTime  La fecha del pago de la compra
   */
  function getFechaPago(): DateTime {
  }

  /**
   * Devuelve el estado del pago de la compra
   * 
   * @return string  El estado del pago de la compra
   */
  function getStatusPago(): string {
  }

  /**
   * Setea el estado del pago de la compra
   * 
   * @param string $status  El estado del pago de la compra
   */
  function setStatusPago(string $status) {
  }

  // /** */
  // function getId(): int {
  // }

  // /** */
  // function getId(): int {
  // }

}
