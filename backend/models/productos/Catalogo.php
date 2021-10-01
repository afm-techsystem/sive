<?php

/**
 * Clase del catalogo
 */
class Catalogo {
  private int $id;
  private string $nombre;

  function __construct(int $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el id del catalogo
   * 
   * @return int  El id del catalogo
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Setea el nombre del catalogo
   * 
   * @param string $nombre  El nombre del catalogo
   */
  function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el nombre del catalogo
   * 
   * @return string  El nombre del catalogo
   */
  function getNombre(): string {
    return $this->nombre;
  }
}
