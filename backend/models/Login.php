<?php
include_once '../config.php';
include_once ROOT_DIR . '/models/usuarios/Cliente.php';
include_once ROOT_DIR . '/models/usuarios/Vendedor.php';
include_once ROOT_DIR . '/models/usuarios/Admin.php';

/**
 * Clase para gestionar lo relacionado al Login del usuario
 */
class Login {
  private const complejidad = '/^[A-Za-z]{4,}$/m';
  private const largoMIN = 4;
  private const largoMAX = 20;
  private static int $intentos = 0;

  // private static ?Login $login = null;

  private function __construct() {
    // self::largoMIN = 6;
    // self::largoMAX = 20;
    // self::complejidad = '/^[A-Za-z]{4,}$/mg';
    // '/^(?=(?:.*[a-z]){1,})(?=(?:.*[A-Z]){1,})(?=(?:.*[0-9]){1,})(?=(?:.*[*#$%&!]){1,})[A-Za-z0-9*#$%&!]{8,}$/mg';
    // self::$intentos = 0;
  }

  // public static function getInstance(): Login {
  //   if (is_null(self::$login)) {

  //     self::$login = new Login();
  //   }
  //   return self::$login;
  // }

  /**
   * Verifica si existe el usuario que intenta logearse
   *
   * @param string $mail  Email del usuario
   * @param string $pass  Password del usuario
   * @return array|null  Retorna los datos del usuario encontrado o null en caso de fallo
   */
  public static function verificarUsuario(string $mail, string $pass): ?array {
    $resultArray = null;
    if (self::verificarComplejidad($pass) && self::verificarLargo($pass)) {
      $sql = "select * from Usuario where correo=? and password=?";
      $db = ConnectionDB::connectDB();
      if ($db) {
        $stmt = $db->prepare($sql);
        if ($stmt) {
          $stmt->bind_param("ss", $mail, $pass);
          $result = $stmt->execute() ? $stmt->get_result() : false;
          if ($result) {
            $resultArray = $result->fetch_assoc();
          }
        }
        ConnectionDB::disconnectDB();
      }
    }
    return $resultArray;
  }

  /**
   * Verifica la complejidad de la contraseña
   *
   * @param string $pass  La contraseña del usuario
   * @return bool  Dependiendo si es compleja o no la contraseña
   */
  public static function verificarComplejidad(string $pass): bool {
    return
      preg_match(self::complejidad, $pass) == 1 ? true : false;
  }

  /**
   * Verifica el largo de la contraseña
   * 
   * @param string $pass  La contraseña a verificar
   * @return bool  Dependiendo de si es esta dentro del largo permitido
   */
  public static function verificarLargo(string $pass): bool {
    $largoPass = strlen($pass);
    return (
      ($largoPass >= self::largoMIN) && ($largoPass <= self::largoMAX));
  }

  /**
   * Verifica la posibilidad de seguir intentando el login
   * 
   * @return bool  Dependiendo de si es posible seguir intentando
   */
  public static function verificarIntentos(): bool {
    return
      !self::$intentos == 3;
  }

  /**
   * Incrementa en uno los intentos del login
   * 
   * @return bool  Dependiendo de si se pudo incrementar o llego al limite de intentos
   */
  public static function incrementarIntento(): bool {
    if (self::verificarIntentos()) {
      self::$intentos++;
      return true;
    }
    return false;
  }

  /**
   * Resetea los intentos del login
   * 
   * @return int  El numero de intentos actual
   */
  public static function resetIntentos(): int {
    self::$intentos = 0;
    return self::$intentos;
  }

  public static function recuperarPassword(int $id) {
  }

  public static function bloquearUsuario(int $id) {
  }

  public static function desbloquearUsuario(int $id) {
  }

  /**
   * Crea el nuevo usuario y la sesion del mismo
   * 
   * @param string $mail  El mail del usuario
   * @param string $pass  El password del usuario
   * @return Usuario|null  El usuario encontrado o null si no lo encuentra o si no es posible seguir intentando
   */
  public static function login(string $mail, string $pass): ?Usuario {
    $nuevoUsuario = null;
    if (self::verificarIntentos()) {
      $datos = self::verificarUsuario($mail, $pass);
      if ($datos) {
        if (isset($datos['reputacion'])) {
          $nuevoUsuario = new Cliente(
            $datos['nombre'],
            $datos['apellido'],
            $datos['correo'],
            $datos['password'],
            $datos['reputacion']
          );
        } elseif (isset($datos['empresa'])) {
          $nuevoUsuario = new Vendedor(
            $datos['nombre'],
            $datos['apellido'],
            $datos['correo'],
            $datos['password'],
            $datos['empresa']
          );
        } else {
          $nuevoUsuario = new Admin(
            $datos['nombre'],
            $datos['apellido'],
            $datos['correo'],
            $datos['password']
          );
        }
      } else {
        self::incrementarIntento();
      }
    }
    return $nuevoUsuario;
  }

  public function logout() {
  }

  /**
   * Devuelve el largo minimo permitido para la contraseña 
   * 
   * @return int  El largo minimo
   */
  public static function getLargoMIN(): int {
    return self::largoMIN;
  }

  /**
   * Devuelve el largo permitido para la contraseña
   * 
   * @return int  El largo maximo
   */
  public static function getLargoMAX(): int {
    return self::largoMAX;
  }

  /**
   * Devuelve la complejidad de la contraseña que se pide (es una expresion regular)
   * 
   * @return string  La expresion regular utilizada
   */
  public static function getComplejidad(): string {
    return self::complejidad;
  }

  /**
   * Devuelve el numeros de intentos actuales 
   * 
   * @return int  El numero de intentos
   */
  public static function getIntentos(): int {
    return self::$intentos;
  }
}
