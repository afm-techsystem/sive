<?php

interface IUsuariosBD {
  function crearUsuario(Usuario $usuario);
  function modificarUsuario();
  function eliminarUsuario();
  function listarUsuario();
  function listarTodosUsuarios();
}
