<?php
if (isset($_FILES['my_file'])) {
    $myFile = $_FILES['my_file'];
    $fileCount = count($myFile['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        //INSERTION DANS BD AVEC ID3
        echo $myFile['name'][$i];
        echo $myFile['tmp_name'][$i];
    }
}

require_once(PATH_VIEWS . 'add.php');
