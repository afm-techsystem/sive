<?php

interface IUsuariosBD {
  function crearUsuario($usuario);
  function modificarUsuario(string $id, $usuario);
  function eliminarUsuario(string $id);
  function listarUsuario();
  function listarTodosUsuarios();
}
