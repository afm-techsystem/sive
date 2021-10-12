<?php

include_once '../../config.php';
include_once ROOT_DIR . '/models/db/ClienteDb.php';
include_once ROOT_DIR . '/models/db/VendedorDb.php';
include_once ROOT_DIR . '/models/db/AdminDb.php';

/**
 * Clase para realizar la conexion con la base de datos
 */
class FactoryConnection {

  public static function getConnection($usuario) {
    if ($usuario instanceof Cliente) return new ClienteDb();
    if ($usuario instanceof Vendedor) return new VendedorDb();
    if ($usuario instanceof Admin) return new AdminDb();
  }
}
