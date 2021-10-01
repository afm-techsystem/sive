<?php

include_once '../config.php';
include_once  ROOT_DIR . '/models/ConnectionDB.php';
include_once  ROOT_DIR . '/models/Login.php';

$mail = $_POST['mail'];
$pass = $_POST['pass'];
// crearUsuarioALaCarrera();

$nuevoUsuario = Login::login($mail, $pass);

if (!is_null($nuevoUsuario)) {
  $rol = '';
  if ($nuevoUsuario instanceof Cliente) {
    $rol = 'cliente';
  }
  if ($nuevUsuario instanceof Vendedor) {
    $rol = 'vendedor';
  }
  if ($nuevoUsuario instanceof Admin) {
    $rol = 'admin';
  }
  if (session_start()) {
    $_SESSION['mail'] = $nuevoUsuario->getEmail();
    $_SESSION['rol'] = $rol;
    $_SESSION['nombre'] = $nuevoUsuario->getNombre();
    $_SESSION['apellido'] = $nuevoUsuario->getApellido();
  } else {
    echo "Error al crear la sesion";
  }

  // $res = json_encode("nombre: $nuevoUsuario->getNombre()");
  // header('Location: /views/'.$rol.'/perfil.php');
  header('Location: /views/cliente/perfilCliente.php');
}
header('Location: /views/login.php');



function crearUsuarioALaCarrera() {
  $db = ConnectionDB::connectDB();
  $sql = "insert into Usuario values('dino@dino.com','dinodino','Dino','Tomassini','1983-01-14','42357398','calle',234,'esquina');";
  $query = mysqli_query($db, $sql);
  ConnectionDB::disconnectDB();
  // correo varchar(40) NOT NULL,
  // password varchar(20) NOT NULL,
  // nombre varchar(20) NOT NULL,
  // apellido varchar(20) NOT NULL,
  // fechaNac date NOT NULL,
  // documento varchar(20) NOT NULL,
  // calle varchar(15) NOT NULL,
  // numero int NOT NULL,
  // esquina varchar(15)	NOT NULL,

}
