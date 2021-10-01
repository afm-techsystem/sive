<?php

/**
 * Clase de Usuario
 */
abstract class Usuario {

  private string $nombre;
  private string $apellido;
  private int $celular;
  private DateTime $fechaNac;
  private int $documento;
  private string $domicilio;
  private string $email;
  private string $password;

  function __construct(
    string $nombre,
    string $apellido, /*$celular, $fechaNac, $documento, $domicilio,*/
    string $email,
    string $pass
  ) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    // $this->celular = $this->verificarTelefono($celular); // corroborar celular valido?
    // $this->fechaNac = $this->verificarFechaNac($fechaNac); // corroborar fecha?
    // $this->documento = $this->verificarDocumento($documento); // corroborar documento con funcion?
    // $this->domicilio = $domicilio;
    $this->email = $email;
    $this->password = $this->encriptarPassword($pass);
  }


  /**
   * Devuelve el nombre del usuario
   * 
   * @return string  El nombre del usuario
   */
  public function getNombre(): string {
    return $this->nombre;
  }

  /**
   * Setea el nombre del usuario
   * 
   * @param string $nombre  El nombre del usuario
   */
  public function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

  /**
   * Devuelve el apellido del usuario
   * 
   * @return string  El apellido del usuario
   */
  public function getApellido(): string {
    return $this->apellido;
  }

  /**
   * Setea el apellido del usuario
   * 
   * @param string $apellido  El apellido del usuario
   */
  public function setApellido(string $apellido) {
    $this->apellido = $apellido;
  }

  /**
   * Verifica un numero de celular
   * 
   * @param int $celular  El celular a verificar
   * @return bool  Devuelve true si el celular es valido
   */
  private function verificarCelular(int $celular): bool {
    // verificar el celular
    echo "Verificando el celular: $celular";
    return true;
  }

  /**
   * Devuelve el celular del usuario
   * 
   * @return int  El celular del usuario
   */
  public function getCelular(): int {
    return $this->celular;
  }

  /**
   * Setea el celular del usuario
   * 
   * @param int $celular  El celular del usuario
   * @return bool  Devuelve true si se pudo setear (si era valido el celular)
   */
  public function setCelular(int $celular): bool {
    if ($this->verificarCelular($celular)) {
      $this->celular = $celular;
      return true;
    }
    return false;
  }

  /**
   * Verificar una fecha de nacimiento
   * 
   * @param DateTime $fecha  La fecha a verificar
   * @return bool  Devuelve true si la fecha es valida
   */
  private function verificarFechaNac(DateTime $fecha): bool {
    // verificar la fecha de nacimiento
    echo "Verificando la fecha de nacimiento: $fecha";
    return true;
  }

  /**
   * Devuelve la fecha de nacimiento del usuario
   * 
   * @return DateTime  La fecha de nacimiento del usuario
   */
  public function getFechaNac(): DateTime {
    return $this->fechaNac;
  }

  /**
   * Verifica un documento de identidad
   * 
   * @param int $documento  El numero de documento a verificar
   * @return bool  Devuelve true si el documento es valido
   */
  private function verificarDocumento(int $documento): bool {
    // verificar la documento
    echo "Verificando la documento: $documento";
    return true;
  }

  /**
   * Devuelve el documento de identidad del usuario
   * 
   * @return int  El documento de identidad del usuario
   */
  public function getDocumento(): int {
    return $this->documento;
  }

  /**
   * Setea el documento de identidad del usuario
   * 
   * @param int $documento  El documento de identidad del usuario
   * @return bool  Devuelve true si el documento se pudo setear (si es valido)
   */
  public function setDocumento(int $documento): bool {
    if ($this->verificarDocumento($documento)) {
      $this->documento = $documento;
      return true;
    }
    return false;
  }

  /**
   * Devuelve el domicilio del usuario
   * 
   * @return string  El domicilio del usuario
   */
  public function getDomicilio(): string {
    return $this->domicilio;
  }

  /**
   * Setea el domicilio del usuario
   * 
   * @param string $domicilio  El domicilio del usuario
   */
  public function setDomicilio(string $domicilio) {
    $this->domicilio = $domicilio;
  }

  /**
   * Devuelve el email del usuario
   * 
   * @return string  El email del usuario
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * Devuelve el hash del password del usuario
   * 
   * @return string  El hash del password del usuario
   */
  function getPassword(): string {
    return $this->password;
  }

  /**
   * Verifica el password pasado con el password del usuaio
   * 
   * @param string $pass  El password del usuario
   * @return bool  Devuelve true si el password pasado coincide con el password del usuario
   */
  public function verificarPass(string $pass): bool {
    // $passHash = md5(sha1($pass).$this->email);
    // return $passHash === $this->password;
    return password_verify($pass, $this->password);
  }

  /**
   * Setea el password del usuario
   * 
   * @param string  El password del usuario
   * @return bool  Devuelve true si el password se pudo setear
   */
  public function setPassword(string $pass): bool {
    $hash = $this->encriptarPassword($pass);
    if ($hash == false || $hash == NULL) {
      return false;
    }
    $this->password = $hash;
    return true;
  }

  /**
   * Encripta el password pasado
   * 
   * @param string $pass  El password a encriptar
   * @return string  El hash del password
   */
  private function encriptarPassword(string $pass): string {
    // return md5(sha1($pass).$this->email);
    return password_hash($pass, PASSWORD_BCRYPT);
  }
}
