<?php require_once(PATH_VIEWS . "header.php"); ?>

<?php
if (!empty($allSongs)) {
                        

                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $url_web_player = substr_replace($url, '', -12);
                $url_stream = substr_replace($url, '', -6)."stream";
    ?>
    <div class="container">
        <div class="section">
            <div class="center row valign-wrapper">
                <div class="col s4"><a href="<?=$url_web_player?>">Web Player</a></div>
                <h4 class="col s4">Server Player Mode</h4>
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
                    <img style="cursor:pointer;" src="<?= PATH_IMAGES . $pic ?>">
                </div>
                <div class="card-content">
                    <h5 class="center"><?= $noExtensionTitle ?></h5>
                    <div class="card-action">
                        <div class="row">
                            <div class="col s5 center" id="position"></div>
                            <div class="col s2 center">/</div>
                            <div class="col s5 center" id="total"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                var myAudio = document.getElementById("myAudio");
                
                window.onload = function () {
                    document.getElementById("total").innerHTML = secondsToMs(myAudio.duration);
                    myAudio.volume = 0;
                };
                myAudio.ontimeupdate = function () {
                    document.getElementById("position").innerHTML = secondsToMs(myAudio.currentTime);
                };
                myAudio.muted = true;
                    myAudio.onended = function () {
                        // window.location.replace("http://stackoverflow.com");
                };
                function secondsToMs(d) {
                    d = Number(d);
                    var m = Math.floor(d % 3600 / 60);
                    var s = Math.floor(d % 3600 % 60);
                    return ('0' + m).slice(-2) + ":" + ('0' + s).slice(-2);
                };
            </script>

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
                            <a href="<?= PLAY_SONG_PAGE . $song->get_idSong() . $href."&mode=player" ?>" class="secondary-content">
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