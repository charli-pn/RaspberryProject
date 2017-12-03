<?php

class Song {

    private $_title;
    private $_autor;
    private $_duration;
    private $_idAlbum;
    private $_idCategory;
    
    function __construct($_title, $_autor, $_duration, $_idAlbum, $_idCategory) {
        $this->_title = $_title;
        $this->_autor = $_autor;
        $this->_duration = $_duration;
        $this->_idAlbum = $_idAlbum;
        $this->_idCategory = $_idCategory;
    }
 
    function get_title() {
        return $this->_title;
    }

    function get_autor() {
        return $this->_autor;
    }

    function get_duration() {
        return $this->_duration;
    }

    function get_idAlbum() {
        return $this->_idAlbum;
    }

    function get_idCategory() {
        return $this->_idCategory;
    }

    function set_title($_title) {
        $this->_title = $_title;
    }

    function set_autor($_autor) {
        $this->_autor = $_autor;
    }

    function set_duration($_duration) {
        $this->_duration = $_duration;
    }

    function set_idAlbum($_idAlbum) {
        $this->_idAlbum = $_idAlbum;
    }

    function set_idCategory($_idCategory) {
        $this->_idCategory = $_idCategory;
    }





}
