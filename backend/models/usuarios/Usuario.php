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
  protected string $calle = '';
  protected int $numero = 0;
  protected string $esquina = '';
  private string $email;
  private string $password;

  function __construct(
    string $nombre,
    string $apellido,
    int $celular,
    // DateTime $fechaNac,
    int $documento,
    // Domicilio $domicilio = '',
    string $email,
    string $pass
  ) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->celular = $this->verificarCelular($celular); // corroborar celular valido?

    $this->fechaNac = new DateTime("19830114"); // YY MM DD
    //$this->verificarFechaNac($fechaNac); // corroborar fecha?
    $this->documento = $this->verificarDocumento($documento); // corroborar documento con funcion?
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
  private function verificarCelular(int $celular) {
    // verificar el celular
    $valido = true;
    echo "Verificando el celular: $celular <br>";
    return
      $valido ? $celular : new Exception("Error al verificar el celular. ", 1);
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
  private function verificarFechaNac(DateTime $fecha) {
    // verificar la fecha de nacimiento
    $valido = true;
    echo "Verificando la fecha de nacimiento: $fecha <br>";
    return
      $valido ? $fecha : new Exception("Error al verificar la fecha de nacimiento. ", 1);
  }

  /**
   * Devuelve la fecha de nacimiento del usuario
   * 
   * @return DateTime  La fecha de nacimiento del usuario
   */
  public function getFechaNac(): string {
    // ACA COMO MANEJAR LA FECHA
    return $this->fechaNac->getTimestamp();
  }

  /**
   * Setea la fecha de nacimiento del usuario
   * 
   */
  public function setFechaNac(DateTime $fechaNac): bool {
    if ($this->verificarFechaNac($fechaNac)) {
      $this->fechaNac = $fechaNac;
      return true;
    }
    return false;
  }

  /**
   * Verifica un documento de identidad
   * 
   * @param int $documento  El numero de documento a verificar
   * @return bool  Devuelve true si el documento es valido
   */
  private function verificarDocumento(int $documento) {
    // verificar la documento
    $valido = true;
    echo "Verificando la documento: $documento <br>";
    return
      $valido ? $documento : new Exception("Error al validar el documento. ", 1);
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
    return '${$this->calle} ${$this->numero} esquina ${$this->esquina}';
  }

  function getCalle(): string {
    return $this->calle;
  }

  function getNumero(): int {
    return $this->numero;
  }

  function getEsquina(): string {
    return $this->esquina;
  }

  function setCalle(string $calle) {
    $this->calle = $calle;
  }

  function setNumero(int $numero) {
    $this->numero = $numero;
  }

  function setEsquina(string $esquina) {
    $this->esquina = $esquina;
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
    $passHash = md5(sha1($pass) . $this->email);
    return
      $passHash === $this->password;
  }

  /**
   * Setea el password del usuario
   * 
   * @param string  El password del usuario
   * @return bool  Devuelve true si el password se pudo setear
   */
  public function setPassword(string $pass) {
    $this->password = $this->encriptarPassword($pass);
  }

  /**
   * Encripta el password pasado
   * 
   * @param string $pass  El password a encriptar
   * @return string  El hash del password
   */
  private function encriptarPassword(string $pass): string {
    return
      md5(sha1($pass) . $this->email);
  }
}
