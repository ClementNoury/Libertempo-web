<?php
define('ROOT_PATH', '');
require_once ROOT_PATH . 'define.php';

$session=(isset($_GET['session']) ? $_GET['session'] : ((isset($_POST['session'])) ? $_POST['session'] : session_id()) ) ;
$session = htmlentities($session, ENT_QUOTES | ENT_HTML401);

include_once ROOT_PATH .'fonctions_conges.php';
include_once INCLUDE_PATH .'fonction.php';
header_menu('', 'Libertempo : '._('calendrier_titre'));


class aaa extends \includes\SQL
{
}

ddd(new aaa());

$calendar = new \CalendR\Calendar();
$a = (new \App\ProtoControllers\Calendrier())->getAnother();

// recuperer les donnes et les injecter dans la vue ! @Timn
require_once VIEW_PATH . 'Calendrier.php';

echo (new \App\ProtoControllers\Calendrier())->get();

bottom();
