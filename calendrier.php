<?php
define('ROOT_PATH', '');
require_once ROOT_PATH . 'define.php';

$session=(isset($_GET['session']) ? $_GET['session'] : ((isset($_POST['session'])) ? $_POST['session'] : session_id()) ) ;
$session = htmlentities($session, ENT_QUOTES | ENT_HTML401);


include_once ROOT_PATH .'fonctions_conges.php';
include_once INCLUDE_PATH .'fonction.php';
header_menu('', 'Libertempo : '._('calendrier_titre'));

// il faut chiffrer les mdp avec le meme algo, quel que soit le how_to_connect_user

d($api->authentification('hr', 'none'));
echo (new \App\ProtoControllers\Calendrier())->get();

bottom();
