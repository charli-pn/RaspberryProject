<?php

require_once(PATH_MODELS.'SongDAO.php');
require_once(PATH_MODELS.'AlbumDAO.php');

$song = new SongDAO(true);

if(isset($_GET['alb'])) {
    $idAlbum = (int)htmlspecialchars($_GET['alb']);
    $songsToDisplay = $song->getSongs($idAlbum);
    $album = new AlbumDAO(true);
    $albumToDisplay = $album->getAlbumWithId($idAlbum);
}
else {
    $songsToDisplay = $song->getAllSongs();
}
    
require_once(PATH_VIEWS.'play.php');