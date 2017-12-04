<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="row">
    <?php foreach ($allAlbums as $album) { ?>
        <div class="col s3">
            <div class="card">
                <div class="card-image">
                    <a href="<?= PLAY_ALB_PAGE . $album->get_idAlbum() ?>"><img src="<?= PATH_IMAGES . $album->get_picture() ?>"></a>
                </div>
                <div class="card-content">
                    <h5><?= $album->get_title() ?></h5>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php require_once(PATH_VIEWS . "footer.php"); ?>