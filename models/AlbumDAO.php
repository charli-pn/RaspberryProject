<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY. 'Album.php');

class AlbumDAO extends DAO {

        
    public function getFirstSong($idAlbum) {
        if ($req = DAO::queryRow("SELECT idSong FROM song WHERE idAlbum=$idAlbum LIMIT 1")) {
            return $req[0];
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getAllAlbums() {
        if ($req = DAO::queryAll('SELECT * FROM album')) {
            foreach ($req as $alb) {
                $res[] = new Album($alb['idAlbum'], $alb['title'], $alb['autor'], $alb['picture']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }
    
    public function getAlbumWithId($idAlbum) {
        if ($req = DAO::queryRow("SELECT * FROM album WHERE idAlbum=$idAlbum")) {
            return new Album($req['idAlbum'], $req['title'], $req['autor'], $req['picture']);
        } else {
            return DAO::getErreur();
        }
    }

}
