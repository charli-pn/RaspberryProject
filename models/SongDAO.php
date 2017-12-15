<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY. 'Song.php');

class SongDAO extends DAO {
    
    public function getFirstSong(){
        if ($req = DAO::queryRow("SELECT idSong FROM song ORDER BY autor LIMIT 1")) {
            return $req[0];
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getAlbumSongs($idSong) {
        if ($req = DAO::queryAll("SELECT * FROM song WHERE idAlbum = (SELECT idAlbum FROM song WHERE idSong=$idSong)")) {
            foreach ($req as $song) {
                $res[] = new Song($song['idSong'], $song['title'], $song['autor'], $song['duration'], $song['idAlbum'], $song['idCategory']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getAllSongs() {
        if ($req = DAO::queryAll("SELECT * FROM song ORDER BY autor")) {
            foreach ($req as $song) {
                $res[] = new Song($song['idSong'], $song['title'], $song['autor'], $song['duration'], $song['idAlbum'], $song['idCategory']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getSongs($idAlbum) {
        if ($req = DAO::queryAll("SELECT * FROM song WHERE idAlbum=$idAlbum")) {
            foreach ($req as $song) {
                $res[] = new Song($song['idSong'], $song['title'], $song['autor'], $song['duration'], $song['idAlbum'], $song['idCategory']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getSongInfos($idSong) {
        if ($req = DAO::queryRow("SELECT s.title AS songTitle, a.title AS albumTitle, a.picture AS picture FROM song s JOIN Album a ON s.idAlbum=a.idAlbum WHERE s.idSong=$idSong")) {
            return $req;
        } else {
            return DAO::getErreur();
        }
    }

    public function updatePicture($idAlbum,$picture) {
        if ($req = DAO::queryBdd('UPDATE album SET picture = " '.$picture.' " WHERE idAlbum = " '.$idAlbum.' " ')) {
            return $req;
        } else {
            return DAO::getErreur();
        }                
    }

}
