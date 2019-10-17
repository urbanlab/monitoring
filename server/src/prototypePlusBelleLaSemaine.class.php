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
    protected function allumerPrototype()
    {
        return 'allumage';
    }

    protected function eteindrePrototype()
    {
        // TODO: Implement eteindrePrototype() method.
    }

    protected function redemarrerPrototype()
    {
        // TODO: Implement redemarrerPrototype() method.
    }


}