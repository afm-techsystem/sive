<?php

include_once '../config.php';
include_once ROOT_DIR . '/models/usuarios/Cliente.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$celular = $_POST['celular'];
$documento = $_POST['documento'];
// $fechaNac = $_POST['fechaNac'];
// $domicilio = $_POST['domicilio'];
$email = $_POST['mail'];
$pass = $_POST['pass'];
$reputacion = 0;

echo "ACA EL PASS: " . $_POST['pass'];
print_r($_POST);

$cliente = new Cliente($nombre, $apellido, $celular, $documento/* $fechaNac, $domicilio*/, $email, $pass, $reputacion);

$cliente->guardarCliente($cliente);




// function registrarCliente(Cliente $cliente) {
//   $crud = new ClienteCrud();
//   $result = $crud->crearUsuario($cliente);
//   if ($result) {
//     echo "<script>alert('Error durante el registro.');</script>";
//   }
// }


/**
 * Clase controlador del cliente
 */
class CustomerController {

  function createClient(string $nombre, string $apellido, /*int $celular, int $documento, Date $fechaNac, string $direccion,*/ string $email, string $pass, int $reputacion = 0) {
  }

  function readClient() {
  }

  function updateClient() {
  }

  function deleteClient() {
  }

  function addToShoppingCart() {
  }

  function deleteFromShoppingCart() {
  }

  // function 
}
