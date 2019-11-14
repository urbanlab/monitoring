<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 07/11/2019
 * Time: 16:05
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if( isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'salut':
            ajoutPrototype($_POST['ipMachine'], $_POST['macMachine'], $_POST['nomMachine']);
            // Y a-t-il une action en attente pour cette machine ?
            $requetesEnAttente = getRequetesEnAttente($_POST['macMachine']);
            var_dump($requetesEnAttente);
            break;
        default:
            break;
    }
}


function getRequetesEnAttente($nomMachine='') {
    $donnees =array();

    $db = new PDO("sqlite:". dirname(dirname(__FILE__)) . '/server/database/monitoring.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->prepare('SELECT * FROM taches_en_attente WHERE machine = ?');

    try
    {
        $db->beginTransaction();
        $req->execute([
            $nomMachine
        ]);
        $db->commit();
        $donnees = $req->fetchAll();
    }
    catch(PDOException $e)
    {
        $db->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
    }
    return $donnees;
}


function ajoutPrototype($ipMachine, $adresseMACMachine, $nomMachine) {
    $db = new PDO("sqlite:". dirname(dirname(__FILE__)) . '/server/database/monitoring.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->prepare('INSERT INTO machines_allumees ( ip_machine, adresse_mac_machine, nom_machine) VALUES(?, ?, ?)');

    try
    {
        $db->beginTransaction();
        $req->execute([
            $ipMachine,
            $adresseMACMachine,
            $nomMachine
        ]);
        $db->commit();
    }
    catch(PDOException $e)
    {
        $db->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
    }
}