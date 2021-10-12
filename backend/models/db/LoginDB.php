<?php
// include_once '../config.php';
include_once 'ConnectionDB.php';

/**
 * Clase para realizar la conexion con la base de datos
 */
class LoginDb extends ConnectionDB {

  protected const user = MYSQL_ROOT_USER; //DB_USER;
  protected const pass = MYSQL_ROOT_PASSWORD; //DB_PASS;

  protected static ?mysqli $conn = null;

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
