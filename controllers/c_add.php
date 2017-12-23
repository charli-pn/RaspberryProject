<?php

require_once(PATH_HELPERS . 'getid3/getid3.php');
require_once(PATH_MODELS . 'AlbumDAO.php');
require_once(PATH_MODELS . 'SongDAO.php');

$albumObj = new AlbumDAO(true);
$songObj = new SongDAO(true);
$getID3 = new getID3;

if (isset($_FILES['my_file'])) {
    $myFile = $_FILES['my_file'];
    $fileCount = count($myFile['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $songTitle = $myFile['name'][$i];
        move_uploaded_file($myFile['tmp_name'][$i], realpath('assets/audio/') . '/'.$songTitle);
        $file = $getID3->analyze(PATH_AUDIO . $songTitle);
        $album = isset($file['tags']['id3v2']['album'][0]) ? $file['tags']['id3v2']['album'][0] : 'Unknown';
        $autor = isset($file['tags']['id3v2']['artist'][0]) ? $file['tags']['id3v2']['artist'][0] : 'Unknown';
        $duration = isset($file['playtime_string']) ? $file['playtime_string'] : 'Unknown';
        $existAlbum = $albumObj->exist($album);
        $albumPicture = ($album != 'Unknown' ) ? $file['comments']['picture']['0']['data'] : 'Unknown';
        $existSong = $songObj->exist($songTitle);
        if ($albumPicture != 'Unknown') {
            file_put_contents(realpath('assets/images/') .'/'. $album . '.jpg', $albumPicture);
        }
        if ($existAlbum == 1) {
            $idAlbum = $albumObj->getIdAlbum($album);
        } else {
            $albumObj->add($album, $autor, $album . '.jpg');
            $idAlbum = $albumObj->lastInserted();
        }
        if ($existSong == 0) {
            $songObj->add($songTitle, $autor, $duration, $idAlbum);
        }
    }
}

require_once(PATH_VIEWS . 'add.php');
