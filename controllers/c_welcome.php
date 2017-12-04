<?php

require_once(PATH_MODELS . 'AlbumDAO.php');

$albumObj = new AlbumDAO(true);
$allAlbums = $albumObj->getAllAlbums();

require_once(PATH_VIEWS.'welcome.php');
