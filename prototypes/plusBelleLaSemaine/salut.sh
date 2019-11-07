#!/usr/bin/env bash

# On souhaite que la machine prévienne le serveur qu'elle est allumée
curl -d "nomMachine=tableTactile&ipMachine=$(hostname -I)" http://192.168.71.201/server/