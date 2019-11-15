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
            $requetesEnAttente = getRequetesEnAttente($_POST['nomMachine']);
            accomplirAction($requetesEnAttente);
            supprimerAction($requetesEnAttente['id_tache']);
            break;
        default:
            break;
    }
}

function accomplirAction(array $actions=array()) {
    foreach ($actions as $action) {
        switch ($action['machine']) {
            case 'table_tactile':
                switch ($action['action']) {
                    case 'lancer plusBelleLaSemaine':
                        shell_exec("ssh erasme@192.168.91.102 'DISPLAY=:0 firefox -new-tab \"https://plusbellelasemaine.erasme.org/\"'");
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;

        }
    }
}


function supprimerAction($idAction=0) {
    $db = new PDO("sqlite:". dirname(dirname(__FILE__)) . '/server/database/monitoring.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->prepare('DELETE FROM taches_en_attente WHERE id_tache = ?');

    try
    {
        $db->beginTransaction();
        $req->execute([
            $idAction
        ]);
        $db->commit();
    }
    catch(PDOException $e)
    {
        $db->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
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