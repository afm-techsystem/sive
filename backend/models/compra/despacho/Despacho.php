<?php

/**
 * Clase de despaho
 */
class Despacho {
  private int $id;
  private Estado $estado;
  private TipoDespacho $tipoDespacho;
  private string $direccion;
  private bool $pagoAprobado;
  private string $posicionEnvio;

  function __construct(int $id, Estado $estado, TipoDespacho $tipoDespacho, string $direccion, bool $pagoAprobado, string $posicionEnvio) {
    $this->id = $id;
    $this->estado = $estado;
    $this->tipoDespacho = $tipoDespacho;
    $this->direccion = $direccion;
    $this->pagoAprobado = $pagoAprobado;
    $this->posicionEnvio = $posicionEnvio;
  }

  /**
   * Devuelve el id del despacho
   * 
   * @return int  El id del despacho
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Devuelve el estado del despacho
   * 
   * @return Estado  El estado del despacho
   */
  function getEstado(): Estado {
    return $this->estado;
  }

  /**
   * Setea el estado del despacho
   * 
   * @param Estado $estado  El estado del despacho
   */
  function setEstado(Estado $estado) {
    $this->estado = $estado;
  }

  /**
   * Devuelve el tipo de despacho
   * 
   * @return TipoDespacho  El tipo de despacho
   */
  function getTipoDespacho(): ?TipoDespacho {
    return $this->tipoDespacho;
  }

  /**
   * Setea el tipo de despacho
   * 
   * @param TipoDespacho $tipoDespacho  El tipo de despacho
   */
  function setTipoDespacho(TipoDespacho $tipoDespacho) {
    $this->tipoDespacho = $tipoDespacho;
  }

  /**
   * Devuelve la direccion de despacho
   * 
   * @return string  La direccion de despacho
   */
  function getDireccion(): string {
    return $this->direccion;
  }

  /**
   * Setea la direccion de despacho
   * 
   * @param string $direccion  La direccion de despacho
   */
  function setDireccion(string $direccion) {
    $this->direccion = $direccion;
  }

  /**
   * Setea si el pago de la compra fue aprobado
   * 
   * @param bool $pagoAprobado true si el pago fue aprobado con exito
   */
  function setPagoAprobado(bool $pagoAprobado) {
    $this->pagoAprobado = $pagoAprobado;
  }

  /**
   * Devuelve si el pago de la compra fue aprobado
   * 
   * @return bool  Devuelve true si el pago fue aprobado con exito
   */
  function isPagoAprobado(): bool {
    return $this->pagoAprobado;
  }

  /**
   * Devuelve la posicion en la linea de envio
   * 
   * @return string  La posicion en la linea de envio
   */
  function getPosicionEnvio(): string {
    return $this->posicionEnvio;
  }

  /**
   * Setea la posicion en la linea de envio
   * 
   * @param string $posicionEnvio  La posicion en la linea de envio
   */
  function setPosicionEnvio(string $posicionEnvio) {
    $this->posicionEnvio = $posicionEnvio;
  }
}

class Estado {
  protected const PAGO_PENDIENTE = 1;
  protected const PREPARACION = 2;
  protected const PARA_RETIRO = 3;
  protected const PARA_ENVIO = 4;
  protected const EN_CAMINO = 5;
  protected const ENTREGADO = 6;
}

class TipoDespacho {
  protected const DOMICILIO = 1;
  protected const RETIRO = 2;
}
