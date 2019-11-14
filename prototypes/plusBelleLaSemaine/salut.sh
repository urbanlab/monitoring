#!/usr/bin/env bash

# OBJECTIF : On souhaite que la machine prévienne le serveur qu'elle est allumée.

# NOTE : Pour que le curl se fasse, il est nécessaire d'attendre le chargement complet du système sinon,
# les pilotes réseaux ne sont pas forcément chargés et accessibles.
sleep 3
# Envoi de la requête
curl -d "action=salut&nomMachine=table_tactile&macMachine=$(ip a |awk '/ether/ {print $2}')&ipMachine=$(hostname -I)" http://192.168.71.201/server/controleurPrototypes.php