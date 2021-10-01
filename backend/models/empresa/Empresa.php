<?php

/** */
class Empresa {
  private int $id;
  private string $nombre;
  private int $rut;
  private string $direccion;

  function _contruct(string $nombre, int $rut, string $direccion) {
    $this->nombre = $nombre;
    $this->rut = $rut;
    $this->direccion = $direccion;
  }

  /**
   * Devuelve el id de la empresa
   * 
   * @return int  El id de la empresa
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Setea el nombre de la empresa
   * 
   * @param string $nombre  El nombre de la empresa
   */
  function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el nombre de la empresa
   * 
   * @return string  El nombre de la empresa
   */
  function getNombre(): string {
    return $this->nombre;
  }

  /**
   * Setea el RUT de la empresa
   * 
   * @param int $rut  El RUT de la empresa
   */
  function setRUT(int $rut) {
    $this->rut = $rut;
  }

  /**
   * Devuelve el RUT de la empresa
   * 
   * @return int  El RUT de la empresa
   */
  function getRUT(): int {
    return $this->rut;
  }

  /**
   * Setea la direccion de la empresa
   * 
   * @param string $direccion  La direccion de la empresa
   */
  function setDireccion(string $direccion) {
    $this->direccion = $direccion;
  }

  /**
   * Devuelve la direccion de la empresa
   * 
   * @return string  La direccion de la empresa
   */
  function getDireccion(): string {
    return $this->direccion;
  }
}
