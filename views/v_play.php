<?php require_once(PATH_VIEWS . "header.php"); ?>

<audio id="myAudio" autoplay>
    <source src="<?= PATH_AUDIO . $songInfos['songTitle'] ?>" type="audio/mpeg" preload="auto">
    Votre navigateur ne prend pas en charge la balise audio.
</audio>

<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <input type="file" id="imgupload" style="display:none"/> 
                <img style="cursor:pointer;" src="<?= PATH_IMAGES . $songInfos['picture'] ?>" onClick="document.getElementById('imgupload').click()">
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal" onClick="togglePlay()"><i class="material-icons" id="PausePlay">play_arrow</i></a>
            </div>
            <div class="card-content">
                <h5><?= $noExtensionTitle ?></h5>
                <div class="row valign-wrapper">
                    <div class="col s2" id="position"></div>
                    <div class="col s6 range-field valign-wrapper"><input id="seekbar" type="range" min="0" max="0" step="1" oninput="setSeek(this.value)" onchange="setSeek(this.value)"></div>
                    <div class="col s2 center-align" id="total"></div>
                    <div class="col s2 center-align"><a class="" onClick="toggleMute()"><i class="material-icons teal-text lighten-1" id="Muted">volume_up</i></a></div>
                    <div class="col s3 range-field valign-wrapper"><input id="vol-control" type="range" min="0" max="100" step="1" oninput="SetVolume(this.value)" onchange="SetVolume(this.value)"></div>
                </div>
            </div>
        </div>
        <script src="<?= PATH_JS . 'music-player.js' ?>"></script>
        <script>var myAudio = document.getElementById("myAudio");
                        myAudio.onended = function () {
                             // window.location.replace("http://stackoverflow.com");
                        };</script>

    </div>
    <div class="col s12 m6">
        <ul class="collection with-header">
            <li class="collection-header"><h4><?= $albumTitle ?></h4></li>
            <?php
            foreach ($songsToDisplay as $song) {
                $songTitle = $song->get_title();
                $autor = (isset($all)) ? $song->get_autor() . ' - ' : '';
                $href = (isset($all)) ? '&all=1' : '';
                ?>
                <li class="collection-item">
                    <div><?= $autor . substr($songTitle, 0, strripos($songTitle, '.'));
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

<?php require_once(PATH_VIEWS . "footer.php"); ?>