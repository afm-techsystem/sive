<?php
include_once '../config.php';
// ! NO ME ESTA ANDANDO DESDE LA CLASE, POR ESO LO PONGO MISMO EN EL LOGIN

/**
 * Clase para realizar la conexion con la base de datos
 */
class ConnectionDB {

  private const DB_host = DB_HOST;
  private const DB_user = DB_USER;
  private const DB_pass = DB_PASS;
  private const DB_port = DB_PORT;
  private const DB_name = DB_NAME;

  private static ?mysqli $conn = null;

  private function __construct() {
  }

  /**
   * Realiza la conexion con la base de datos
   *
   * @return mysqli|null Devuelve la conexion o null en caso de fallo
   */
  public static function connectDB(): ?mysqli {
    if (is_null(self::$conn)) {
      try {
        self::$conn = new mysqli(
          self::DB_host,
          self::DB_user,
          self::DB_pass,
          self::DB_name,
          self::DB_port
        );
      } catch (mysqli_sql_exception $e) {
        echo "ERROR: " . $e . "<br />";
      }
    }
    return self::$conn;
  }

  /**
   * Termina la conexion con la base de datos
   */
  public static function disconnectDB() {
    if (!is_null(self::$conn)) {
      self::$conn->close();
      self::$conn = null;
    }
  }
}
