<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 17/10/2019
 * Time: 15:58
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/vueAbstraite.class.php';
include_once __DIR__ . '/../ListePrototypes.class.php';
class VueAccueil extends VueAbstraite
{
    protected $vue = '
<h1 id="titreAccueil">Liste des prototypes</h1>
<div id="tableauPrototypes">';

    public function __construct(ListePrototypes $listeProto)
    {
        $this->vue .= '
<table>
    <tr>
        <th>Nom</th>
        <th>État actuel</th>
        <th>Actions</th>
    </tr>';
        foreach ($listeProto->tableauPrototypes as $proto) {
            $this->vue .= '
    <tr>
        <td>' . $proto->nomPrototype . '</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary">Rafraîchir</button>
            <button type="button" class="btn btn-success">Allumer</button>
            <button type="button" class="btn btn-warning">Redémarrer</button>
            <button type="button" class="btn btn-danger">Éteindre</button>
        </td>';
        }
        $this->vue .= '
</table></div>';

    }

    function getVue()
    {
        return $this->vue;
    }

}