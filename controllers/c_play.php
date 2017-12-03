<?php

require_once(PATH_MODELS . 'AlbumDAO.php');

$albumObj = new AlbumDAO(true);

$allAlbums = $albumObj->getAlbums();

require_once(PATH_VIEWS.'play.php');
