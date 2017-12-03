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

}
