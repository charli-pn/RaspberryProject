<?php
/*
 * Index du site
 */

// Initialisation des paramètres du site
require_once('./config/configuration.php');
require_once(PATH_TEXTES.LANG.'.php');

//vérification de la page demandée 

if(isset($_GET['page']) && is_file(PATH_CONTROLLERS.$_GET['page'].".php")) 
	$page = $_GET['page']; // http://.../index.php?page=toto
elseif(!isset($_GET['page']))
	$page="welcome"; //page d'accueil du site - http://.../index.php
else 
	$page="404"; //page demandée inexistante

//appel du controller
require_once(PATH_CONTROLLERS.$page.'.php'); 

?>
