<?php
// analyse l'url pour savoir quel controller aller cherche.

require 'vendor/autoload.php';

// charge les chemins permis
include( 'routes.php' );

// vérifie si il y a une valeur de $a et $e. Si pas, met une valeur par défault.
$a = isset( $_REQUEST[ 'a' ] ) ? $_REQUEST[ 'a' ] : 'index';
$e = isset( $_REQUEST[ 'e' ] ) ? $_REQUEST[ 'e' ] : 'posts';

// vérifie que les chemins existe
if ( !in_array( $a . '_' . $e, $routes ) ) {
    die( 'We couldn\'t find the page you are asking, it doesn\'t exist' );
}

// renvoye vers le fichier adéquat en fonciton de $e
$controller_name = '\Controller\\' . ucfirst($e) . 'Controller';
$controller = new $controller_name;

// appel la function adéquat en fonction de $a
$datas = call_user_func( [ $controller, $a ] );

// charge la vue principale
include( 'views/view.php' );
