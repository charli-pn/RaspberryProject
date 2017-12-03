<?php require_once(PATH_VIEWS . "header.php"); ?>

<?php foreach ($allAlbums as $album) { ?>
    <a href="<?= PLAY_ALB_PAGE.$album->get_idAlbum() ?>"><img class="responsive-img" src="<?= PATH_IMAGES . $album->get_picture() ?>"></a>
<?php } ?>
    
<?php require_once(PATH_VIEWS . "footer.php"); ?>