<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 15/10/2019
 * Time: 13:49
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo 'toto';

/*
 * L'application fonctionne ainsi :
 * CAS BASIQUE
 * - le client-navigateur lance une requête toutes les 5 secondes pour connaître l'état courant de toutes les machines du lab.
 * - le serveur questionne et met à jour les machines qu'il a en mémoire.
 * - le serveur renvoie au client-navigateur l'état de toutes les machines.
 * ACTION SUR NAVIGATEUR
 * - le client-navigateur lance une requête spécifique (allumer, redémarrer, éteindre une seule machine ou un prototype complet).
 * - le serveur lit les actions correspondant à cette requête et les effectue puis met à jour ses informations de statut.
 */

