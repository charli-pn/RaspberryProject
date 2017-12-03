<?php require_once(PATH_VIEWS . "header.php"); ?>

<?php foreach ($allAlbums as $album) { ?>
<div class=row">
    <a class="col s2" href="<?= PLAY_ALB_PAGE.$album->get_idAlbum() ?>"><img class="responsive-img" src="<?= PATH_IMAGES . $album->get_picture() ?>"></a>
</div>
<?php 
} 
?>
    
<?php require_once(PATH_VIEWS . "footer.php"); ?>