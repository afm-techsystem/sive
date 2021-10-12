<?php
include_once '../../config.php';
include_once ROOT_DIR . '/models/usuarios/Usuario.php';
include_once ROOT_DIR . '/models/db/FactoryConnection.php';
include_once ROOT_DIR . '/models/crud/ClienteCrud.php';

/**
 * Clase del Cliente
 */
class Cliente extends Usuario {

  private string $id;
  private int $reputacion;

  function __construct(
    string $nombre,
    string $apellido,
    int $celular,
    int $documento,
    // DateTime $fechaNac,
    // Domicilio $direccion,
    string $email,
    string $pass,
    int $reputacion
  ) {
    parent::__construct(
      $nombre,
      $apellido,
      $celular,
      $documento,
      // $fechaNac,
      // $direccion,
      $email,
      $pass
    );
    $this->id = $email;
    $this->reputacion = $reputacion;
  }

  /**
   * Devuelve el id del cliente
   * 
   * @return string  El id del cliente
   */
  function getId(): string {
    return $this->id;
  }

  /**
   * Incrementa un punto la reputacion del cliente
   * 
   * @return bool  Devuelve true si se pudo incrementar la reputacion (maximo 10)
   */
  function incrementarReputacion(): bool {
    if ($this->reputacion < 10) {
      $this->reputacion += 1;
      return true;
    }
    return false;
  }

  /**
   * Disminuye un punto la reputacion del cliente
   * 
   * @return bool  Devuelve true si se pudo dirminuir la reputacion (minimo 0)
   */
  function menosReputacion(): bool {
    if ($this->reputacion > 0) {
      $this->reputacion -= 1;
      return true;
    }
    return false;
  }

  /**
   * Devuelve la reputacion del cliente
   * 
   * @return int  La reputacion del cliente
   */
  function getReputacion(): int {
    return $this->reputacion;
  }

  /**
   * Crea un cliente
   * 
   * @param string $nombre  El nombre del cliente
   * @param string $apellido  El apellido del cliente
   * @param int $celular  El celular del cliente
   * @param int $documento  El documento del cliente
   * @param DateTime $fechaNac  La fehca de nacimiento del cliente
   * @param string $domicilio  El domicilio del cliente
   * @param string $email  El email del cliente
   * @param string $password  El password del cliente
   * @return Cliente|null  Devuelve el cliente creado o null en caso de fallo
   */
  function guardarCliente(Cliente $cliente): ?Cliente {
    $crud = new ClienteCrud();
    $creado = $crud->crearUsuario($cliente);
    if ($creado) {
      echo "Se guardo el cliente";
    } else {
      echo "Ocurrio un error al guardar el cliente";
    }
    return $cliente;
  }

  /**
   * Modifica un cliente
   * 
   * @param int $id  El id del cliente a modificar
   * @param string $nombre  El nuevo nombre del cliente
   * @param string $apellido  El nuevo apellido del cliente
   * @param int $celular  El nuevo celular del cliente
   * @param int $documento  El nuevo documento del cliente
   * @param DateTime $fechaNac  La nueva fehca de nacimiento del cliente
   * @param string $domicilio  El nuevo domicilio del cliente
   * @param string $email  El nuevo email del cliente
   * @param string $password  El nuevo password del cliente
   * @return Cliente|null  Devuelve el cliente modificado o null en caso de fallo
   */
  function modificarCliente(
    int $id,
    string $nombre,
    string $apellido,
    int $celular,
    int $documento,
    DateTime $fechaNac,
    string $domicilio,
    string $email,
    string $password
  ): ?Cliente {
    return null;
  }

  /**
   * Eliminar un cliente
   * 
   * @param int $id  El id del cliente a eliminar
   * @return Cliente|null  Devuelve el cliente eliminado o null en caso de fallo
   */
  function eliminarCliente(int $id): ?Cliente {
    return null;
  }

  // function existe($mail): bool {}
}
