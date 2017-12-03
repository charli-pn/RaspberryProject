<?php

require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY. 'Album.php');

class AlbumDAO extends DAO {

    public function getAlbums() {
        if ($req = DAO::queryAll('SELECT * FROM album')) {
            foreach ($req as $alb) {
                $res[] = new Album($alb['idAlbum'], $alb['title'], $alb['autor'], $alb['picture']);
            }
            return $res;
        } else {
            return DAO::getErreur();
        }
    }

}
