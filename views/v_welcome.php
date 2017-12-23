<?php require_once(PATH_VIEWS . "header.php"); ?>

<?php if (!empty($allAlbums)) { ?>
    <div class="row">
        <?php
        foreach ($allAlbums as $album) {
            $idAlbum = $album->get_idAlbum();
            ?>
            <div class="col s3">
                <div class="card">
                    <div class="card-image">
                        <a href="<?= PLAY_SONG_PAGE . $albumObj->getFirstSong($idAlbum) ?>"><img src="<?= PATH_IMAGES . $album->get_picture() ?>"></a>
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
<?php } else {
    ?>
    <div class="section row">
        <div class="col s12 m6">
            <div class="card grey lighten-5">
                <div class="card-content black-text">
                    <span class="card-title">Ah !</span>
                    <p>You haven't upload any album yet.</p>
                </div>
                <div class="card-action">
                    <a href="<?= ADD_PAGE ?>">Upload music !</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php require_once(PATH_VIEWS . "footer.php"); ?>