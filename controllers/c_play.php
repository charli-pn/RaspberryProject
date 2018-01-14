<?php

require_once(PATH_MODELS . 'SongDAO.php');
require_once(PATH_MODELS . 'AlbumDAO.php');

$song = new SongDAO(true);
$album = new AlbumDAO(true);

$allSongs = $song->getAllSongs();

if (!empty($allSongs)) {
    if (isset($_GET['song']) && !isset($_GET['all'])) {
        $currentSongId = (int) htmlspecialchars($_GET['song']);
        $songsToDisplay = $song->getAlbumSongs($currentSongId);
        $songInfos = $song->getSongInfos($currentSongId);
        $albumTitle = $songInfos['albumTitle'];
    } else {
        $all = 1;
        $songsToDisplay = $song->getAllSongs();
        if (isset($_GET['song'])) {
            $currentSongId = (int) htmlspecialchars($_GET['song']);
        } else {
            $currentSong = $songsToDisplay[0];
            $currentSongId = $currentSong->get_idSong();
        }
        $songInfos = $song->getSongInfos($currentSongId);
        $albumTitle = 'Your music';
    }
    $extensionTitle = $songInfos['songTitle'];
    $noExtensionTitle = substr($extensionTitle, 0, strripos($extensionTitle, '.'));
}
    
if(OS=="Windows")
{
    if(isset($_GET['mode'])){
        $mode = htmlspecialchars($_GET['mode']);
        if($mode == "player"){
            $vlc = "\"c:\\Program Files (x86)\\VideoLAN\\VLC\\vlc.exe\"";
            $song_path = "\"C:\\wamp64\\www\\RaspberryProject\\assets\\audio\\";
            $song_file = $songInfos['songTitle'];
            $end_cmd = "\" -I dummy vlc://quit";
            $commmand = $vlc." ".$song_path.$song_file.$end_cmd;
            exec('start /B "window_play" '.$commmand,$output,$return);
            require_once(PATH_VIEWS . 'player.php');
        }
        if($mode == "stream"){
            $vlc = "\"c:\\Program Files (x86)\\VideoLAN\\VLC\\vlc.exe\"";
            $song_path = "\"C:\\wamp64\\www\\RaspberryProject\\assets\\audio\\";
            $song_file = $songInfos['songTitle'];
            $end_cmd = "\" -I dummy :sout=#http{mux=ffmpeg{mux=flv},dst=:8080/} :sout-keep vlc://quit";
            $commmand = $vlc." ".$song_path.$song_file.$end_cmd;
            exec('start /B "window_stream" '.$commmand,$output,$return);
            require_once(PATH_VIEWS . 'stream.php');
        }
    }else{
        require_once(PATH_VIEWS . 'web_player.php');
    }
}
else if(OS=="Linux")
{
    if(isset($_GET['mode'])){
        $mode = htmlspecialchars($_GET['mode']);
        if($mode == "player"){
            $vlc = "vlc";
            $song_path = "\"/var/www/RaspberryProject/assets/audio/";
            $song_file = $songInfos['songTitle'];
            $end_cmd = "\" -I dummy vlc://quit"."> /dev/null 2>&1 &";
            $commmand = $vlc." ".$song_path.$song_file.$end_cmd;
            exec($commmand,$output,$return);
            require_once(PATH_VIEWS . 'player.php');
        }
        if($mode == "stream"){
            $vlc = "vlc";
            $song_path = "\"/var/www/RaspberryProject/assets/audio/";
            $song_file = $songInfos['songTitle'];
            $end_cmd = "\" -I dummy :sout=#http{mux=ffmpeg{mux=flv},dst=:8080/} :sout-keep vlc://quit"."> /dev/null 2>&1 &";
            $commmand = $vlc." ".$song_path.$song_file.$end_cmd;
            exec($commmand,$output,$return);
            require_once(PATH_VIEWS . 'stream.php');
        }
    }else{
        require_once(PATH_VIEWS . 'web_player.php');
    }
}



//<?= PATH_AUDIO . $songInfos['songTitle'] //?>


