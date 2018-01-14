<?php require_once(PATH_VIEWS . "header.php"); ?>

<?php
if (!empty($allSongs)) {

?>
    <?php
                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $url_player = $url."&mode=player";
                $url_stream = $url."&mode=stream";
    ?>
    <div class="container">
        <div class="section">
            <div class="center row valign-wrapper">
                <div class="col s4"><a href="<?=$url_player?>">Server Player</a></div>
                <h4 class="col s4">Web Player Mode</h4>
                <div class="col s4"><a href="<?=$url_stream?>">Streaming</a></div>
            </div>
        </div>
    </div>
    <audio id="myAudio" autoplay>
        <source src="<?= PATH_AUDIO . $songInfos['songTitle'] ?>" type="audio/mpeg" preload="auto">
        Votre navigateur ne prend pas en charge la balise audio.
    </audio>

    <div class="row">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <?php $pic = ($songInfos['picture'] != 'Unknown') ? $songInfos['picture'] : 'Unknown.jpg'; ?>
                    <img style="cursor:pointer;" src="<?= PATH_IMAGES . $pic ?>" onClick="togglePlay()">
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
        <div class="col s12 m8">
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


    
<?php
} else {
    ?>
    <div class="section row">
        <div class="col s12 m6">
            <div class="card grey lighten-5">
                <div class="card-content black-text">
                    <span class="card-title">Ah !</span>
                    <p>You haven't upload any music yet.</p>
                </div>
                <div class="card-action">
                    <a href="<?= ADD_PAGE ?>">Upload music !</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php require_once(PATH_VIEWS . "footer.php"); ?>