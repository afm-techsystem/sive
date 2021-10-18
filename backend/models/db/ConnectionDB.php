<?php

// include_once '../../config.php';

/**
 * Clase para realizar la conexion con la base de datos
 */
abstract class ConnectionDB {

  protected const host = DB_HOST;
  protected const port = DB_PORT;
  protected const name = DB_NAME;
  // protected string $user;
  // protected string $pass;

  // protected ?mysqli $conn;

  public function __construct() {
  }

  /**
   * Realiza la conexion con la base de datos
   *
   * @return mysqli|null Devuelve la conexion o null en caso de fallo
   */
  abstract public static function connectDB(): ?mysqli;


  /**
   * Termina la conexion con la base de datos
   */
  abstract public static function disconnectDB();
}
