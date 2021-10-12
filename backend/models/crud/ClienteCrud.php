<?php
include_once '../../config.php';
include_once ROOT_DIR . '/models/db/FactoryConnection.php';
include_once ROOT_DIR . '/interfaces/IUsuariosBD.php';
include_once ROOT_DIR . '/models/usuarios/Cliente.php';
include_once ROOT_DIR . '/models/usuarios/Usuario.php';

/**
 * Clase para realizar las tareas de alta, baja y modificacion de Clientes
 */
class ClienteCrud implements IUsuariosBD {

  public function crearUsuario($cliente): bool {

    // $cliente->getFechaNac(), 
    $listaSql['usuario'] = "insert into Usuario (
      Nombre, 
      Apellido, 
      Documento, 
      Fecha_Nac, 
      Calle,
      Numero,
      Esquina,
      correo, 
      Password
      ) values( " .
      $cliente->getNombre() . "," .
      $cliente->getApellido() . "," .
      $cliente->getDocumento() . "," .
      $cliente->getFechaNac() . "," .
      $cliente->getCalle() . "," .
      $cliente->getNumero() . "," .
      $cliente->getEsquina() . "," .
      $cliente->getEmail() . "," .
      $cliente->getPassword() .
      ")";
    $listaSql['cliente'] = "insert into Cliente (
      correo,
      Reputacion
      ) values( " .
      $cliente->getEmail() . "," .
      $cliente->getReputacion() .
      ");";
    $listaSql['telefono'] = "insert into Telefono (
        correo,
        Telefono
      ) values( " .
      $cliente->getEmail() . "," .
      $cliente->getCelular() .
      ");";
    print_r($listaSql);
    $db = FactoryConnection::getConnection($cliente)::connectDB();
    if ($db) {
      foreach ($listaSql as $query => $sql) {
        echo "EJECUTANDO LA SENTENCIA PARA " . $query;
        $stmt = $db->prepare($sql);
        if ($stmt) {
          print_r($stmt);
          if (!$stmt->execute()) {
            echo "FALLO LA EJECUCION DEL STATEMENT";
            return false;
          }
        } else {
          echo "FALLO EL STATEMENT";
          return false;
        }
      }
    } else {
      echo "FALLO LA CONEXION";
      return false;
    }
    FactoryConnection::getConnection($cliente)::disconnectDB();
    return true;
  }

  public function modificarUsuario(string $id, $usuario) {
  }

  public function eliminarUsuario(string $id) {
  }

  public function listarUsuario() {
  }

  public function listarTodosUsuarios() {
  }
}
