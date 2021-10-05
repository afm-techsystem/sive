#!/bin/bash

readonly $CREAR_USUARIOS="../scripts/scriptsSQL/1_crearUsuarios.sql"
readonly $CREAR_TABLAS="../scripts/scriptsSQL/2_crearBase-Tablas.sql"
readonly $ASIGNAR_ROLES="../scripts/scriptsSQL/3_asignarRolesBase-Tablas.sql"
readonly $MINAR_BASE="./minarDatos.sql"
readonly $USER_NAME_DB=""
readonly $USER_PASS_DB=""


declare -A lista_tareas
lista_tareas[usuarios]=$CREAR_USUARIOS
lista_tareas[tablas]=$CREAR_TABLAS
lista_tareas[roles]=$ASIGNAR_ROLES
lista_tareas[minar]=$MINAR_BASE

for tarea in "${!lista_tareas[@]}"; do
  mysql -u $USER_NAME_DB -p $USER_PASS_DB < ${lista_tareas[$tarea]}
done
#docker exec -it database mysql -u root -pdino -e "$(cat ./sql/todoelsql.sql)"
