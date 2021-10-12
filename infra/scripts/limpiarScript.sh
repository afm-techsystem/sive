#!/bin/bash

#######################################
# Script para limpiar los directorios #
#######################################

sudo deluser sysadmin
sudo rm -r /home/sysadmin

sudo deluser dba
sudo rm -r /home/dba

sudo deluser respaldo
sudo rm -r /home/respaldo
