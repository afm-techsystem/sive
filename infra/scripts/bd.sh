#!/bin/bash

#########################################################
#   Script con menu para administrar la base de datos   #
#               A.F.M. Tech System - 2021               #
#########################################################


readonly DBA_USER="dba"
readonly DBA_PASS="dba-Sive.21"

readonly BACKUP_USER="respaldo"
readonly BACKUP_PASS="respaldo-Sive.21"

readonly DB_NAME="bd_sive"

readonly PATH_BACKUP_FILES="$HOME/respaldos"

readonly PATH_SCRIPTS_SQL="./scriptsSQL"


#Para generar las pantallas y borrar el archivo temporal donde se guardan las acciones del usuario
DIALOG=${DIALOG=dialog}
tempfile=$(tempfile 2> /dev/null) || tempfile=/tmp/test$$
trap "rm -f $tempfile" 0 1 2 5 15

###################
# Función para el menú de base de datos
###################
function manejo_opciones_bd() {
  case $choice in
    1)
      crear_usuario_bd;; 
    2)
      crear_bd;;
    4)
      backup;;
    5)
      restore;; 
  esac
}

###################
# Función para crear usuarios de la base de datos
###################
function crear_usuario_bd() {  
  if mysql -u $DBA_USER -p$DBA_PASS < $PATH_SCRIPTS_SQL/1_crearUsuarios.sql; then
    $DIALOG --clear --title "Creación de usuarios en la base de datos" --msgbox "Usuarios creados con éxito." 0 0
  else
    $DIALOG --clear --title "Creación de usuarios en la base de datos" --msgbox "Ocurrio un error al intentar crear los usuarios." 0 0
    exit 1
  fi
}

###################
# Función para crear la base de datos
###################
function crear_bd() {
  mysql -u $DBA_USER -p$DBA_PASS < $PATH_SCRIPTS_SQL/2_crearBase-Tablas.sql
  if [ $? -eq 0 ]; then
    $DIALOG --clear --title "Creación de la base de datos" --msgbox "Base de datos creada con éxito." 0 0
  else
    $DIALOG --clear --title "Creación de la base de datos" --msgbox "Ocurrio un error al intentar crear la base de datos." 0 0
    exit 1
  fi
  
  mysql -u $DBA_USER -p$DBA_PASS < $PATH_SCRIPTS_SQL/3_asignarRolesBase-Tablas.sql
  if [ $? -eq 0 ]; then
    $DIALOG --clear --title "Asignación de roles" --msgbox "Asignación de roles exitosa." 0 0
  else
    $DIALOG --clear --title "Asignación de roles" --msgbox "Ocurrio un error al intentar asignar los roles de los usuarios." 0 0
    exit 1
  fi
}

###################
# Función para respaldar la base de datos
###################
function backup() {
  readonly local BACKUP_FILE_NAME="$(date +%d-%m-%G_%H-%M-%S)-BackUp_SIVE"
  mysqldump -h localhost -u $BACKUP_USER -p$BACKUP_PASS --ssl --dump-date $DB_NAME > $PATH_BACKUP_FILES/$BACKUP_FILE_NAME.sql
  if [ $? -eq 0 ]; then
    $DIALOG --clear --title "Respaldo de la base de datos" --msgbox "Respaldo terminado con éxito." 0 0
  else
    $DIALOG --clear --title "Respaldo de la base de datos" --msgbox "Ocurrio un error durante el respaldo." 0 0
    exit 1
  fi
}

###################
# Función para recuperar la base de datos
###################
function restore() {
  # falta elegir el respaldo
  local BACKUP_FILE_NAME=""
  $DIALOG --clear --title "Restauración de la base de datos" --fselect $PATH_BACKUP_FILES 0 0 2> $tempfile
  if [ $? -eq 0 ]; then
    BACKUP_FILE_NAME=$(cat $tempfile)
  else
    $DIALOG --clear --title "Restauración de la base de datos" --msgbox "Ocurrio un error al seleccionar el archivo." 0 0
    exit 1
  fi
  
  mysql -u $DBA_USER -p$DBA_PASS < $PATH_BACKUP_FILES/$BACKUP_FILE_NAME
  if [ $? -eq 0 ]; then
    $DIALOG --clear --title "Restauración de la base de datos" --msgbox "Restauración realizada con éxito." 0 0
  else
    $DIALOG --clear --title "Restauración de la base de datos" --msgbox "Ocurrio un error durante la restauración." 0 0
    exit 1
  fi
}

###################
# PRINCIPAL
###################
flag=true
while $flag; do
  $DIALOG --clear --title "Menú de Base de Datos" --menu "Elige una opción:" 0 0 0 \
    1 "Crear usuarios" \
    2 "Crear base de datos" \
    3 "Respaldar" \
    4 "Recuperar respaldo" \
    5 "Salir" \
    2> $tempfile

  salida_menu=$?
  choice=$(cat $tempfile)

  if [ $salida_menu -eq 0 ]; then
    if [ $choice -eq 5 ]; then
      flag=false
    fi
    manejo_opciones_bd
  else
    exit 0
  fi
done
./main.sh
