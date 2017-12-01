<?php
/*
 * Paramètres de configuration du site
 */
 
const DEBUG = true; // production : false; dev : true

// Langue du site
const LANG ='en-GB';

// Paramètres du site : nom de l'auteur
const AUTEUR = 'CHARLOTE - FLORIAN - KYLE - SICHIALUN'; 
const DESCRI = "KyaPlay web page";

//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/');
define('PATH_ASSETS','./assets/');

define('PATH_LIB','./lib/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/');
define('PATH_SCRIPTS','./scripts/');
define('PATH_TEXTES','./languages/');
define('PATH_ENTITY','./entity/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_JS', PATH_ASSETS.'js/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_AUDIO', PATH_ASSETS.'audio/');