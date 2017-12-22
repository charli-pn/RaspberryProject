<?php
require_once(PATH_HELPERS . 'getid3/getid3.php');
require_once(PATH_MODELS.'AlbumDAO.php');
require_once(PATH_MODELS.'SongDAO.php');

$albumObj = new AlbumDAO(true);
$songObj = new SongDAO(true);
$getID3 = new getID3;

if (isset($_FILES['my_file'])) {
    $myFile = $_FILES['my_file'];
    $fileCount = count($myFile['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        move_uploaded_file($myFile['tmp_name'][$i], PATH_AUDIO . $myFile['name'][$i]);
        $file = $getID3->analyze(PATH_AUDIO . $myFile['name'][$i]);
        $songTitle = $myFile['name'][$i];
        $album = $file['tags']['id3v2']['album'][0];
        $autor = $file['tags']['id3v2']['artist'][0];
        $duration = $file['playtime_string'];
        $albumPicture = $file['comments']['picture']['0']['data'];
        file_put_contents(PATH_IMAGES . $album . '.jpg', $albumPicture);
        $exist = $albumObj->exist($album);
        if($exist == 1) {
            $idAlbum = $albumObj->getIdAlbum($album);
        }
        else{
            $albumObj->add($album,$autor,$album .'.jpg');
            $idAlbum = $albumObj->lastInserted();
        }
        $songObj->add($songTitle,$autor,$duration,$idAlbum);  
    }
}

require_once(PATH_VIEWS . 'add.php');
