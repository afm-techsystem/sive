<?php

include_once './MetodoPago.php';

/**
 * Clase de tarjeta
 */
class Tarjeta extends MetodoPago {
  private int $id;
  private string $tipo;
  private int $numero;
  private string $titular;
  private DateTime $fechaVenc;

  function __construct(int $id, string $tipo, int $numero, string $titular, DateTime $fechaVenc) {
    $this->id = $id;
    $this->tipo = $tipo;
    $this->numero = $numero;
    $this->titular = $titular;
    $this->fechaVenc = $fechaVenc;
  }

  /**
   * Devuelve el id de la tarjeta
   * 
   * @return int  El id de la tarjeta
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Setea el tipo de la tarjeta
   * 
   * @param string $tipo  El tipo de la tarjeta
   */
  function setTipo(string $tipo) {
    $this->tipo = $tipo;
  }

  /**
   * Devuelve el tipo de la tarjeta
   * 
   * @return string  El tipo de la tarjeta
   */
  function getTipo(): string {
    return $this->tipo;
  }

  /**
   * Setea el numero de la tarjeta
   * 
   * @param int $numero  El numero de la tarjeta
   */
  function setNumero(int $numero) {
    $this->numero = $numero;
  }

  /**
   * Devuelve el numero de la tarjeta
   * 
   * @return int  El numero de la tarjeta
   */
  function getNumero(): int {
    return $this->numero;
  }

  /**
   * Setea el titular de la tarjeta
   * 
   * @param string $titular  El titular de la tarjeta
   */
  function setTitular(string $titular) {
    $this->titular = $titular;
  }

  /**
   * Devuelve el titular de la tarjeta
   * 
   * @return string  El titular de la tarjeta
   */
  function getTitular(): string {
    return $this->titular;
  }

  /**
   * Setea la fecha de vencimiento de la tarjeta
   * 
   * @param DateTime $fechaVenc  La fecha de vencimiento de la tarjeta
   */
  function setFechaVenc(DateTime $fechaVenc) {
    $this->fechaVenc = $fechaVenc;
  }

  /**
   * Devuelve la fecha de vencimiento de la tarjeta
   * 
   * @return DateTime  La fecha de vencimiento de la tarjeta
   */
  function getFechaVenc(): DateTime {
    return $this->fechaVenc;
  }
}
