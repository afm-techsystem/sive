<?php

/**
 * Clase de categoria
 */
class Categoria {
  private int $id;
  private string $nombre;

  function __construct(int $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el id de la categoria
   * 
   * @return int  El id de la categoria
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Setea el nombre de la categoria
   * 
   * @param string $nombre  El nombre de la categoria
   */
  function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el nombre de la categoria
   * 
   * @return string  El nombre de la categoria
   */
  function getNombre(): string {
    return $this->nombre;
  }
}
