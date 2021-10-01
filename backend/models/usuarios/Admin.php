<?php
include_once '../../config.php';
include_once ROOT_DIR . '/models/usuarios/Usuario.php';
include_once ROOT_DIR . '/models/usuarios/Vendedor.php';
include_once ROOT_DIR . '/models/productos/Categoria.php';

/**
 * Clase del usuario administrador
 */
class Admin extends Usuario {

  private int $id;

  function __construct(string $nombre, string $apellido, /*int $celular, int $cedula, $fechaNac,*/ string $email, string $pass) {
    parent::__construct($nombre, $apellido, /*$celular, $cedula, $fechaNac,*/ $email, $pass);
  }

  /**
   * Devuelve el id del usuario
   * 
   * @return int  El id del usuario
   */
  function getId(): int {
    return $this->id;
  }

  /**
   * Crea una categoria
   * 
   * @param string $nombre  Nombre de la categoria
   * @return Categoria  La categoria creada
   */
  function crearCategoria(string $nombre): ?Categoria {
    $categoria = null;
    if ($nombre !== '') {
      $categoria = new Categoria($nombre);
    }
    return $categoria;
  }

  /**
   * Modifica la categoria
   * 
   * @param int $id  El id de la categoria a modificar
   * @param string $nombre  El nombre de la categoria
   * @return Categoria  La categoria modificada
   */
  function modificarCategoria(int $id, string $nombre): Categoria {
    $categoria = new Categoria($nombre);
    return $categoria;
  }

  /**
   * Elimina la categoria
   * 
   * @param int $id  El id de la categoria a eliminar
   * @return Categoria  La categoria eliminada
   */
  function eliminarCategoria(int $id): Categoria {
    $categoria = new Categoria('');
    return $categoria;
  }

  /**
   * Crea un vendedor
   * 
   * @param string $nombre  El nombre del vendedor
   * @param string $apellido  El apellido del vendedor
   * @param int $celular  El celular del vendedor
   * @param int $documento  El documento del vendedor
   * @param  $fechaNac  La fecha de nacimiento del vendedor
   * @param string $email  El email del vendedor
   * @param string $pass  El password del vendedor
   * @param string $empresa  El nombre de la empresa a la cual pertenece el vendedor
   * @return Vendedor  El vendedor creado
   */
  function crearVendedor(string $nombre, string $apellido, /*int $celular, int $documento, $fechaNac,*/ string $email, string $pass, string $empresa): Vendedor {
    $vendedor = new Vendedor($nombre, $apellido, $email, $pass, $empresa);
    return $vendedor;
  }

  /** */
  function buscarVendedor(int $id): Vendedor {
    $vendedor = new Vendedor('', '', '', '', '');
    return $vendedor;
  }

  /**
   * Modifica un vendedor
   * 
   * @param int $id  El id del vendedor a modificar
   * @param string $pass  El password del vendedor
   * @param string $empresa  El nombre de la empresa a la cual pertenece el vendedor
   * @return Vendedor  El vendedor modificado
   */
  function modificarVendedor(int $id, string $pass, string $empresa): Vendedor {
    $vendedor = $this->buscarVendedor($id);
    if ($vendedor) {
      // $vendedor->setCelular();
      $vendedor->setPassword($pass);
      $vendedor->setEmpresa($empresa);
    }
    return $vendedor;
  }

  /**
   * Elimina un Vendedor
   * 
   * @param int $id  El id del vendedor a eliminar
   * @return Vendedor  El vendedor eliminado
   */
  function eliminarVendedor(int $id): Vendedor {
    $vendedor = $this->buscarVendedor($id);
    return $vendedor;
  }
}
