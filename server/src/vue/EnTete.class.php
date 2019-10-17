<?php
/**
 * @author : Pierre-Alexandre Racine (pierrealexandreracine -at(@)- gmail -dot(.)- com)
 * @owner : ERASME (https://www.erasme.org/)
 * @copyright : ERASME (https://www.erasme.org/)
 * @license  : ALFERO GPL ( https://www.gnu.org/licenses/agpl-3.0.fr.html )
 * Project : TODO
 * Date: 17/10/2019
 * Time: 15:19
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/vueAbstraite.class.php';
class EnTete extends VueAbstraite
{
    protected $vue = '';

    function getVue()
    {
        $lienCSS = (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']=='monitor');
        $this->vue = '<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- CSS Monitoring -->
    <link rel="stylesheet" href="src/vue/css/monitoring.css"> <!-- sur ma machine -->

    <title>Monitoring des prototypes du lab</title>
  </head>
  <body>';


        return $this->vue;
    }

}