<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY. 'Song.php');

class SongDAO extends DAO {
    
    public function getAllSongs() {
        if ($req = DAO::queryAll("SELECT * FROM song")) {
            foreach ($req as $song) {
                $res[] = new Song($song['title'], $song['autor'], $song['duration'], $song['idAlbum'], $song['idCategory']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getSongs($idAlbum) {
        if ($req = DAO::queryAll("SELECT * FROM song WHERE idAlbum=$idAlbum")) {
            foreach ($req as $song) {
                $res[] = new Song($song['title'], $song['autor'], $song['duration'], $song['idAlbum'], $song['idCategory']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getPictureAlbum($idSong) {
        if ($req = DAO::queryRow("SELECT s.title AS title, a.picture AS picutre FROM song s JOIN Album a ON s.idAlbum=a.idAlbum WHERE s.idSong=$idSong")) {
            return $res;
        } else {
            return DAO::getErreur();
        }
    }

}
