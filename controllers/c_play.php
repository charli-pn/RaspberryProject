<?php

require_once(PATH_MODELS.'SongDAO.php');
require_once(PATH_MODELS.'AlbumDAO.php');

$song = new SongDAO(true);
$album = new AlbumDAO(true);


if(isset($_GET['alb']) && isset($_GET['song'])) {
    $idAlbum = (int)htmlspecialchars($_GET['alb']);
    $songsToDisplay = $song->getSongs($idAlbum);
    $albumToDisplay = $album->getAlbumWithId($idAlbum);
}
else {
    $songsToDisplay = $song->getAllSongs();
}

/*if(isset($_GET['song'])) {
    $idSong = (int)htmlspecialchars($_GET['song']);
    $currentSongPic = $song->getPictureAlbum($idSong);
}
else{
    
}   */

require_once(PATH_VIEWS.'play.php');