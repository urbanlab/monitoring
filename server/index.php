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

/*
 * CONFIGURATION
 */

// Commentez la ligne du prototype dont vous souhaitez désactiver le monitoring.
$prototypesAGerer = array(
    // Nom du prototype => Nom de la classe qui le gère (située dans le fichier prototypeNomDeLaClasse.class.php ).
    'Plus Belle La Semaine' => 'PlusBelleLaSemaine',
);

var_dump($_REQUEST);


include_once __DIR__ . '/src/ListePrototypes.class.php';
$donneesPrototypes = new ListePrototypes($prototypesAGerer);

// En-tête
include_once __DIR__ . '/src/vue/EnTete.class.php';
$enTete = new EnTete();
$enTete = $enTete->getVue();
// Barre de navigation
include_once __DIR__ . '/src/vue/NavBar.class.php';
$navbar = new NavBar();
$navbar = $navbar->getVue();
// Corps de page
include_once __DIR__ . '/src/vue/VueAccueil.class.php';
$corpsDePage = new VueAccueil($donneesPrototypes);
$corpsDePage = $corpsDePage->getVue();
// PIed de page
include_once __DIR__ . '/src/vue/Footer.class.php';
$piedDePage = new Footer();
$piedDePage = $piedDePage->getVue();


echo $enTete . $navbar . $corpsDePage . $piedDePage;