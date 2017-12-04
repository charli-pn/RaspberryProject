<?php

require_once(PATH_MODELS.'SongDAO.php');
require_once(PATH_MODELS.'AlbumDAO.php');

$song = new SongDAO(true);
$album = new AlbumDAO(true);

if(isset($_GET['song'])){
    $currentSongId = (int) htmlspecialchars($_GET['song']);
    $songsToDisplay = $song->getAlbumSongs($currentSongId);
    $songInfos = $song->getSongInfos($currentSongId);
    $albumTitle = $songInfos['albumTitle'];
}
else{
    $songsToDisplay = $song->getAllSongs();
    $currentSong = $songsToDisplay[0];
    $currentSongId = $currentSong->get_idSong();
    $songInfos = $song->getSongInfos($currentSongId);
    $albumTitle = 'Your music';
}

$extensionTitle = $songInfos['songTitle'];
$noExtensionTitle = substr($extensionTitle, 0, strripos($extensionTitle, '.'));

require_once(PATH_VIEWS.'play.php');