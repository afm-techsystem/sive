<?php
// include_once '../../config.php';
include_once ROOT_DIR . '/models/db/FactoryConnection.php';
include_once ROOT_DIR . '/interfaces/IUsuariosBD.php';
include_once ROOT_DIR . '/models/usuarios/Cliente.php';
include_once ROOT_DIR . '/models/usuarios/Usuario.php';

/**
 * Clase para realizar las tareas de alta, baja y modificacion de Clientes
 */
class ClienteCrud implements IUsuariosBD {

  //? Agregar los demas datos
  public function crearUsuario($cliente): bool {

    // "INSERT INTO Usuario (Nombre,Apellido,Documento,correo,Password) VALUES('" . $cliente->getNombre() . "','" . $cliente->getApellido() . "','" . $cliente->getDocumento() . "','" . $cliente->getEmail() . "','" . $cliente->getPassword() . "')";
    $listaSql['usuario'] = "INSERT INTO Usuario (
      Nombre,
      Apellido,
      Documento," .
      // Fecha_Nac, 
      // Calle,
      // Numero,
      // Esquina,
      "correo,
      Password
      ) VALUES('" .
      $cliente->getNombre() . "','" .
      $cliente->getApellido() . "','" .
      $cliente->getDocumento() . "','" .
      // $cliente->getFechaNac() . "," .
      // $cliente->getCalle() . "," .
      // $cliente->getNumero() . "," .
      // $cliente->getEsquina() . "," .
      $cliente->getEmail() . "','" .
      $cliente->getPassword() .
      "')";

    // "INSERT INTO Cliente (correo,Reputacion) VALUES('" . $cliente->getEmail() . "'," . $cliente->getReputacion() . ")";
    $listaSql['cliente'] = "INSERT INTO Cliente (
      correo,
      Reputacion
      ) VALUES('" .
      $cliente->getEmail() . "'," .
      $cliente->getReputacion() .
      ")";

    // "INSERT INTO Telefono (correo,Telefono) values('" . $cliente->getEmail() . "','" . $cliente->getCelular() . "')";
    $listaSql['telefono'] = "INSERT INTO Telefono (
      correo,
      Telefono
      ) values('" .
      $cliente->getEmail() . "','" .
      $cliente->getCelular() .
      "')";

    $db = FactoryConnection::getConnection($cliente)::connectDB();
    if ($db) {
      foreach ($listaSql as $query => $sql) {
        echo "EJECUTANDO LA SENTENCIA PARA " . $query . "<br>";
        echo "SQL: $sql <br>";
        $stmt = $db->prepare($sql);
        echo "ERROR $db->errno: $db->error <br>";
        //!! ---> FALLA EN EL PREPARE, PERO A PARTIR DE LA SEGUNDA QUERY, EN EL MOTOR FUNCIONAN TODAS ESTAS CONSULTAS
        print_r($stmt);
        $this->ejecutarStatement($stmt, $query);
      }
    } else {
      echo "FALLO LA CONEXION";
      return false;
    }
    FactoryConnection::getConnection($cliente)::disconnectDB();
    echo "Todas las query realizadas con exito";
    return true;
  }

  private function ejecutarStatement($stmt, $query) {
    print_r($stmt);
    if ($stmt) {
      if ($stmt->execute()) {
        echo "Sentencia $query ejecutada con exito <br>";
        $stmt->reset();
        // $stmt->close();
        return true;
      } else {
        echo "FALLO LA EJECUCION DEL STATEMENT <br>";
      }
    } else {
      echo "ERROR: NO HAY STATEMENT <br>";
    }
    return false;
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
