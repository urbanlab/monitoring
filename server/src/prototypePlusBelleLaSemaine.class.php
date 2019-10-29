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

    public $peutRafraichir = ' disabled';
    public $peutAllumer = '';
    public $peutRedemarrer = ' disabled';
    public $peutEteindre = ' disabled';
    public $peutReinstaller = ' disabled';

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
        // todo : créer un objet « machine » qui pourra allumer et qui gérera les appels à son tour.
        shell_exec('wakeonlan b8:ae:ed:73:9d:3f');
        return 'allumage';
    }

    public function eteindrePrototype()
    {
        // TODO: Implement eteindrePrototype() method.
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