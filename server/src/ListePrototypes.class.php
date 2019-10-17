<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 17/10/2019
 * Time: 14:19
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ListePrototypes
{
    /**
     * @var array La liste des objets prototypes avec leurs données correspondantes.
     */
    protected $tableauPrototypes = array();

    /**
     * ListePrototypes constructor. Va chercher les données des prototypes dont on a la liste.
     */
    public function __construct(array $listePrototypes=array())
    {
        foreach ($listePrototypes as $prototype) {
            include_once __DIR__ . '/prototype' . $prototype . '.class.php';
            $proto = new $prototype();
            array_push($this->tableauPrototypes, $proto);
        }
    }


}