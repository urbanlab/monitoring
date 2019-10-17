<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 17/10/2019
 * Time: 14:29
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

abstract class prototype
{
    abstract protected function __construct();

    abstract protected function getEtat();

    abstract protected function allumerPrototype();

    abstract protected function eteindrePrototype();

    abstract protected function redemarrerPrototype();
}