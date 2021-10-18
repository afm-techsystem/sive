<?php
// include_once '../config.php';
include_once 'ConnectionDB.php';

/**
 * Clase para realizar la conexion con la base de datos
 */
class ClienteDb extends ConnectionDB {

  protected const user = DB_USER_CLIENTE; // DB_USER_VENDEDOR
  protected const pass = DB_PASS_CLIENTE; // DB_PASS_VENDEDOR
  protected static $conn = null;

  public static function connectDB(): ?mysqli {
    if (is_null(self::$conn)) {
      try {
        self::$conn = new mysqli(
          self::host,
          self::user,
          self::pass,
          self::name,
          self::port
        );
        echo "CONEXION ESTABLECIDA <br>";
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
