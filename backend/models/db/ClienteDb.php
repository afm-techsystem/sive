<?php
include_once '../config.php';
include_once 'ConnectionDB.php';

/**
 * Clase para realizar la conexion con la base de datos
 */
class ClienteDb extends ConnectionDB {

  protected const user = DB_USER_VENDEDOR; //DB_USER_CLIENTE;
  protected const pass = DB_PASS_VENDEDOR; //DB_PASS_CLIENTE;
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
