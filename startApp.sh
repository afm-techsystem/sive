#!/bin/bash

function devServerUp(){
  echo "Levantando servidor de Desarrollo..."
  docker-compose -f infra/dev/docker-compose.yml up -d
}

function testServerUp(){
  echo "Levantando servidor de Testing..."
  docker-compose -f infra/test/docker-compose.yml up
}

function prodServerUp(){
  # Tomar datos
  echo "Ahora necesitamos preguntarle algunos datos."
  direccionApp=read "Ubicacion de la app (ej: /home/pepe/proyectos/esteMismo)"
  # validar que no este vacio
  echo "Ahora necesitamos los datos para la base de datos. Debe asegurase de tener instalado y corriendo el servicio de MySQL version 5.7.35 ."
  hostBD=read "El host: "
  userBD=read "El usuario para acceder: "
  passBD=read "La contraseña: "
  nameDB=read "El nombre de la base de datos: "

  # Configurar el archivo docker-compose.yml con los datos ingresados por el usuario
  echo "Creando el archivo para la ejecucion de docker..."

  # Levantar docker
  echo "Levantando servidor de Produccion..."
  docker-compose -f infra/prod/docker-compose.yml up
}

options=("Desarrollo" "Testing" "Produccion" "Salir")
select opt in ${options[@]};
do
  case $opt in
    Desarrollo)
      devServerUp
      ;;
    Testing)
      testServerUp
      ;;
    Produccion)
      prodServerUp
      ;;
    Salir)
      echo "Saliendo..."
      break
      ;;
    *)
      echo "Opcion no definida."
      ;;
  esac
done
