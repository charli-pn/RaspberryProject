<?php require_once(PATH_VIEWS . "header.php"); ?>

<audio id="myAudio">
    <source src="<?= PATH_AUDIO . $songInfos['songTitle'] ?>" type="audio/mpeg" preload="auto">
    Votre navigateur ne prend pas en charge la balise audio.
</audio>

<div class="row">
    <div class="col s12 m6">
        <div class="card">
            <div class="grey darken-2 card-image">
                <img src="<?= PATH_IMAGES . $songInfos['picture'] ?>" onClick="togglePlay()">
                <a class="waves-effect waves-light" onClick="togglePlay()"></a>
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" onClick="togglePlay()"><i class="material-icons" id="PausePlay">play_arrow</i></a>
            </div>
            <div class="card-content">
                <h5><?= $noExtensionTitle ?></h5>
                <div class="row valign-wrapper">
                    <div class="col s2" id="position"></div>
                    <div class="col s6 range-field valign-wrapper"><input id="seekbar" type="range" min="0" max="" step="2" oninput="setSeek(this.value)" onchange="setSeek(this.value)"></div>
                    <div class="col s2 center-align" id="total"></div>
                    <div class="col s2 center-align"><a class="" onClick="toggleMute()"><i class="material-icons teal-text lighten-1" id="Muted">volume_up</i></a></div>
                    <div class="col s3 range-field valign-wrapper"><input id="vol-control" type="range" min="0" max="100" step="1" oninput="SetVolume(this.value)" onchange="SetVolume(this.value)"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m6">
        <ul class="collection with-header">
            <li class="collection-header"><h4><?= $albumTitle ?></h4></li>
            <?php
            foreach ($songsToDisplay as $song) {
                $songTitle = $song->get_title();
                $href=(isset($all)) ? '&all=1': '';
                ?>
                <li class="collection-item">
                    <div><?= substr($songTitle, 0, strripos($songTitle, '.')); 
                        ?>
                        <a href="<?= PLAY_SONG_PAGE . $song->get_idSong() . $href ?>" class="secondary-content">
                            <i class="material-icons">play_arrow</i>
                        </a>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>

<?php require_once(PATH_VIEWS . "play_script.php"); ?>

<?php require_once(PATH_VIEWS . "footer.php"); ?>