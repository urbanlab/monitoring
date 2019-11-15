# Monitoring du lab

Système de gestion/monitoring du lab ERASME


## Étape 1 : Installation du serveur

Connectez-vous sur le serveur de monitoring du lab.

```bash
ssh root@labmonitoring.erasme.lan
```

Placez les fichiers et dossiers de monitoring/server/src dans */var/www/html/* .


# Liste complète des dispositifs

## Plus belle la semaine

### Pré-requis

Nous voulons faire tourner la machine tactile sous linux pour un meilleur contrôle. Pour cela assurons-nous de :
- avoir curl installé
- avoir openssh-server installé
- avoir la clef SSH publique de la machine serveur comme origine acceptée sur le SSH de la table tactile. 

### Explications générales

Nous n'avons pas le contrôle sur cette application. Elle consiste pour nous à ouvrir une page dans un navgateur web
(conexion internet requise).

Le problème vient que plusieurs prototypes/applications peuvent être installées/utilisées/monitorées sur la même
machine : la table tactile. En l'occurence, nous avons, pour le moment, *museotouch* installé également sur ce même
appareil.

La solution est donc de placer une tâche en attente dans une base de données SQLite si une application est lancée depuis
l'interface de monitoring. Une fois la table tactile allumée, le serveur vérifie quelles sont les actions en attente et
les lancera.

```pseudo-code
    1 serveur       : réception d'une demande de lancement d'une application.
    2 serveur       : démarrage de la table tactile en wake-on-lan.
    3 serveur       : mémorisation de la tâche « lancer plus belle la semaine » en base de données.
    4 table tactile : allumée par le wake-on-lan (2)
    5 table tactile : envoi d'un signal au serveur pour prévenir de son état « allumé ».
    6 serveur       : recherche et découverte d'une action en attente dans la base de données correspondant à la machine ayant envoyé le signal.
    7 serveur       : envoi d'une commnde ssh pour lancer l'application « plus belle la semaine ».  
``` 

## MUSEOTOUCH




## indispensable


Paperzoom

- liste du matériel physique et  procédure d'installation du matériel
- liste des technos : python openGl Shading Language
- étapes actuelles d'allumage/extinction
- étapes voulues pour l'automatisation

Espace VR + UNicité

- liste du matériel physique et  procédure d'installation du matériel
- liste des technos
- étapes actuelles d'allumage/extinction
- étapes voulues pour l'automatisation

flux

interpretable

recto verso

ouidire

table tactile

funambulium


## souhaitable

bac à sable augmenté

mdm sur mesure

trait-d'union

bus

bien vivre  : maquette + plus belle la semaine

triomix : tripack / starbox / oida

escape game

