<?php

include_once '../../config.php';
include_once ROOT_DIR . '/models/usuarios/Usuario.php';

/**
 * Clase de Vendedor
 */
class Vendedor extends Usuario {

  private int $id;
  public string $empresa;

  function __construct(string $nombre, string $apellido, /*int $celular, int $cedula, $fechaNac,*/ string $email, string $pass, string $empresa) {
    parent::__construct($nombre, $apellido, /*$celular, $cedula, $fechaNac,*/ $email, $pass);
    $this->empresa = $empresa;
  }

  /**
   * Devuelve el id del vendedor
   * 
   * @return int  El id del vendedor
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Devuelve la empresa a la que pertenece el vendedor
   * 
   * @return string  La empresa a la que pertenece el vendedor
   */
  function getEmpresa(): string {
    return $this->empresa;
  }

  /**
   * Setea la empresa a la que pertenece el vendedor
   * 
   * @param string $empresa  La empresa a la que pertenece el vendedor
   */
  function setEmpresa(string $empresa) {
    $this->empresa = $empresa;
  }

  /**
   * Crear un producto
   * 
   * @param string $nombre  El nombre del producto
   * @param string $descripcion  La descripcion del producto
   * @param bool $esNuevo  El estado del producto (true = nuevo)
   * @param string $procedencia  La procedencia del producto
   * @param float $precio  El precio del producto
   * @return Producto|null  El producto creado o null en caso de error
   */
  function crearProducto(string $nombre, string $descripcion, bool $esNuevo, string $procedencia, float $precio): ?Producto {
    return null;
  }

  /**
   * Modificar un producto
   * 
   * @param int $id  El id del producto a modificar
   * @param string $nombre  El nuevo nombre del producto
   * @param string $descripcion  La nueva descripcion del producto
   * @param bool $esNuevo  El nuevo estado del producto (true = nuevo)
   * @param string $procedencia  La nueva procedencia del producto
   * @param float $precio  El nuevo precio del producto
   * @return Producto|null  El producto modificado o null en caso de error
   */
  function modificarProdcuto(int $id, string $nombre, string $descripcion, bool $estado, string $procedencia, float $precio): ?Producto {
    return null;
  }

  /**
   * Eliminar un prodcto
   * 
   * @param int $id  El id del producto a eliminar
   * @return Producto|null  El producto eliminado o null en caso de error 
   */
  function eliminarProducto(int $id): ?Producto {
    return null;
  }

  /**
   * Crea un catalogo
   * 
   * @param string $nombre  El nombre del catalogo
   * @return Catalogo|null  El catalogo creado o null en caso de error
   */
  function crearCatalogo(string $nombre): ?Catalogo {
    return null;
  }

  /**
   * Modificar un catalogo
   * 
   * @param int $id  El id del catalogo a modificar
   * @param string $nombre  El nuevo nombre del catalogo
   * @return Catalogo|null El catalogo modificado o null en caso de error
   */
  function modificarCatalogo(int $id, string $nombre): ?Catalogo {
    return null;
  }

  /**
   * Eliminar un catalogo
   * 
   * @param int $id  El id del catalogo a eliminar
   * @return Catalogo|null  El catalogo eliminado o null en caso de error
   */
  function eliminarCatalogo(int $id): ?Catalogo {
    return null;
  }
}
