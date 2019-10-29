<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 29/10/2019
 * Time: 10:24
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['proto']) && isset($_GET['action'])) {


    switch ($_GET['proto']){
        case 'Plus belle la semaine':
            switch ($_GET['action']){
                case 'allumer':
                    include_once __DIR__ . '/src/prototypePlusBelleLaSemaine.class.php';
                    $prototype = new PlusBelleLaSemaine();
                    echo $prototype->allumerPrototype();
                    break;
            }

            break;
    }
}