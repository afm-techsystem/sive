#!/bin/bash

####################################################
#   Script con menu para administrar el sistema    #
#            A.F.M. Tech System - 2021             #
####################################################


readonly $APP_NAME="sive"

#Para generar las pantallas y borrar el archivo temporal donde se guardan las acciones del usuario
DIALOG=${DIALOG=dialog}
tempfile=$(tempfile 2> /dev/null) || tempfile=/tmp/test$$
trap "rm -f $tempfile" 0 1 2 5 15

###################
# Función para el menú de sistemas
###################
function manejo_opciones_sistema() {
  case $choice in
    1)
      copiar_scripts_skell;;
    2)
      crear_usuario;;
  esac
}

###################
# Función para la ubicar los script necesarios en el skell del sistema operativo
###################
function copiar_scripts_skell() {
  cd $HOME/$APP_NAME/infra
  sudo mkdir -p /etc/skell/scripts
  sudo cp -r ./scripts /etc/skell/scripts
  if [ $? -eq 0 ]; then
    $DIALOG --clear --title "Archivos creados" --msgbox "Los archivos se copiaron con éxito." 0 0
    cd - 
  else 
    $DIALOG --clear --title "Archivos no creados" --msgbox "Ocurrio un error al copiar los archivos." 0 0
    exit 1
  fi
}

###################
# Función para la creacion de usuarios del sistema operativo
###################
function crear_usuario() {
  # local flag=true
  
  declare -A lista_usuarios
  lista_usuarios[sysadmin]="sysadmin-Sive.21"
  lista_usuarios[dba]="dba-Sive.21"
  lista_usuarios[respaldo]="respaldo-Sive.21"
  lista_usuarios[cliente]="cliente-Sive.21"
  lista_usuarios[vendedor]="vendedor-Sive.21"
  local ok=0
  for usuario in "${!lista_usuarios[@]}"; do
    sudo useradd -m -p ${lista_usuarios[$usuario]} $usuario
    if [ $? -eq 0 ]; then
      let ok+=1
    fi 
  done
  #[ $? -eq 0 ]; then 
  #echo "cantidad de usuarios: ${#lista_usuarios[@]}"
  #echo "cantidad de iteraciones: $ok"

  if [ $ok -eq "${#lista_usuarios[@]}" ]; then
    $DIALOG --clear --title "Usuarios creados" --msgbox "Usuarios creados con éxito." 0 0
  else #${!lista_usuarios[@]}
    $DIALOG --clear --title "Usuario no creado" --msgbox "Ocurrio un error al crear el usuario." 0 0
    exit 1
  fi

  # $DIALOG --clear --title "Crear nuevo usuario del sistema" --msgbox "Ingrese los nombres y contraseñas de los usuarios, para terminar deje en blanco el nombre de usuario." 0 0  
  
  # while $flag; do
  #   $DIALOG --clear --title "Ingresar usuario" --inputbox "Ingrese el nombre de usuario, para terminar deje en blanco el nombre de usuario" 0 0 2> $tempfile
  #   if [ $? -ne 0 ]; then
  #     exit 1
  #   fi

  #   USUARIO=$(cat $tempfile)
  #   if [ -z $USUARIO ]; then
  #     flag=false
  #     break
  #   fi
    
  #   $DIALOG --clear --title "Ingresar contraseña" --inputbox "Ingrese la contraseña para $USUARIO" 0 0 2> $tempfile
  #   if [ $? -ne 0 ]; then
  #     exit 1
  #   fi
    
  #   PASS=$(cat $tempfile)
  #   if [ -z $PASS ]; then
  #     exit 1
  #   fi
    
  #   sudo useradd -m -p $PASS $USUARIO
  #   if [ $? -eq 0 ]; then
  #     $DIALOG --clear --title "Usuario creado" --msgbox "Usuario $USUARIO creado con éxito." 0 0
  #   else
  #     $DIALOG --clear --title "Usuario no creado" --msgbox "Ocurrio un error al crear el usuario." 0 0
  #     exit 1
  #   fi
  # done
}

###################
# PRINCIPAL
###################
flag=true;
while $flag; do
  $DIALOG --clear --title "Menú Sistemas" --menu "Elige una opción:" 0 0 0 \
  1 "Poner los scripts en el skell" \
  2 "Crear usuarios del sistema" \
  3 "Salir" \
  2> $tempfile

  salida_menu=$?
  choice=$(cat $tempfile)

  if [ $salida_menu -eq 0 ]; then
    if [ $choice -eq 3 ]; then
      flag=false
    fi
    manejo_opciones_sistema
  else
    exit 0
  fi
done

./main.sh
