<?php

class Album {

    private $_idAlbum;
    private $_title;
    private $_autor;
    private $_picture;
    
    function __construct($_idAlbum, $_title, $_autor, $_picture) {
        $this->_idAlbum = $_idAlbum;
        $this->_title = $_title;
        $this->_autor = $_autor;
        $this->_picture = $_picture;
    }

    function get_idAlbum() {
        return $this->_idAlbum;
    }

    function get_title() {
        return $this->_title;
    }

    function get_autor() {
        return $this->_autor;
    }

    function get_picture() {
        return $this->_picture;
    }

    function set_idAlbum($_idAlbum) {
        $this->_idAlbum = $_idAlbum;
    }

    function set_title($_title) {
        $this->_title = $_title;
    }

    function set_autor($_autor) {
        $this->_autor = $_autor;
    }

    function set_picture($_picture) {
        $this->_picture = $_picture;
    }



}
