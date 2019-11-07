#!/usr/bin/env bash

# On souhaite que la machine prévienne le serveur qu'elle est allumée
curl -d "nomMachine=tableTactile&macMachine=$(ip a |awk '/ether/ {print $2}')&ipMachine=$(hostname -I)" http://192.168.71.201/server/