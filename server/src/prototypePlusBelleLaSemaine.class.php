<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 17/10/2019
 * Time: 14:28
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/prototypeAbstrait.class.php';
class PlusBelleLaSemaine extends prototype
{
    public $nomPrototype = 'Plus belle la semaine';

    /*
     * Mettre la valeur ' disabled' pour désactiver un bouton.
     */
    public $peutRafraichir = ' disabled';
    public $peutAllumer = '';
    public $peutRedemarrer = ' disabled';
    public $peutEteindre = ' ';
    public $peutReinstaller = ' disabled';

    public $etatCourant = 'éteint';

    public function __construct()
    {

    }

    protected function getEtat()
    {
        // TODO: Implement getEtat() method.
    }

    /**
     * Allumer le prototype se fera en plusieurs étapes :
     * - allumer la machine principale (la grande table tactile)
     * - une fois la machine allumée, ouvrir firefox avec une url particulière.
     */
    public function allumerPrototype()
    {
        // Allumage de la table tactile.
        //shell_exec('wakeonlan b8:ae:ed:73:9d:3f');
        $this->etatCourant = 'allumage';
        // Ce n'est pas suffisant, la machine est allumée mais, contrairement aux autres prototypes,
        // plusieurs logiciels peuvent être lancés sur cette table tactile.
        // La solution est de mettre une tâche en attente dans une base de données jusqu'à ce que la table tactile
        // prévienne le serveur qu'elle est allumée. Une fois le serveur prévenu, il activera cette tâche en attente.
        $db = new PDO("sqlite:". dirname(dirname(__FILE__)) . '/database/monitoring.db');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare('INSERT INTO taches_en_attente ( action, machine) VALUES(?, ?)');

        try
        {
            $db->beginTransaction();
            $req->execute([
                'lancer plusBelleLaSemaine',
                'table_tactile'
            ]);
            $db->commit();
            return 'tata';
        }
        catch(PDOException $e)
        {
            $db->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
        return 'allumage';
    }

    public function eteindrePrototype()
    {

    }

    public function redemarrerPrototype()
    {
        // TODO: Implement redemarrerPrototype() method.
    }

    public function reinstallerPrototype()
    {
        // TODO: Implement reinstallerPrototype() method.
    }


}