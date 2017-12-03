<?php require_once(PATH_VIEWS . "header.php"); ?>


<?php if (isset($albumToDisplay)) { ?>
    <div class="center-align">
        <img class="responsive-img circle" src="<?= PATH_IMAGES . $albumToDisplay->get_picture() ?>">
        <p><?= $albumToDisplay->get_autor() ?></p>
        <p><?= $albumToDisplay->get_title() ?></p>
    </div>
    <?php
}
foreach ($songsToDisplay as $song) {
    ?>
    <audio controls="controls">
        <source src="<?= PATH_AUDIO . $song->get_title() ?>" type="audio/mp3" preload="auto">
        Votre navigateur ne prend pas en charge la balise audio.
    </audio>
    <?php
}
?>
<!-- <div class="row">
    <div class="col">
        <div class="card">
            <div class="grey darken-2 card-image">
                <img src="<?php // echo PATH_IMAGES   ?>headset.svg" onClick="togglePlay()">
                <a class="waves-effect waves-light" onClick="togglePlay()"></a>
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" onClick="togglePlay()"><i class="material-icons" id="PausePlay">play_arrow</i></a>
            </div>
            <div class="card-content">
                <h5><?php // echo $song->get_title()   ?></h5>
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
</div>


<script>
var myAudio = document.getElementById("myAudio");

window.onload = function () {
    myFunction()
};

function myFunction() {
    document.getElementById("seekbar").max = myAudio.duration;
    document.getElementById("total").innerHTML = secondsToMs(myAudio.duration);
}

myAudio.play();
document.getElementById("seekbar").max = myAudio.duration;
myAudio.pause();

var isPlaying = false;

function SetVolume(val)
{
    console.log('Before: ' + myAudio.volume);
    myAudio.volume = val / 100;
    console.log('After: ' + myAudio.volume);
}

function togglePlay() {
    if (isPlaying) {
        myAudio.pause();
        document.getElementById("PausePlay").innerHTML = "play_arrow";
    } else {
        myAudio.play();
        document.getElementById("PausePlay").innerHTML = "pause";
    }
}
;

var isMute = false;

function toggleMute() {

    isMute = myAudio.muted;

    if (isMute) {
        myAudio.muted = false;
        document.getElementById("Muted").innerHTML = "volume_up";
    } else {
        myAudio.muted = true;
        document.getElementById("Muted").innerHTML = "volume_off";
    }
}
;

myAudio.onplaying = function () {
    isPlaying = true;
};
myAudio.onpause = function () {
    isPlaying = false;
};

document.getElementById("position").innerHTML = secondsToMs(0);

document.getElementById("seekbar").value = 0;
document.getElementById("vol-control").value = 100;

// Assign an ontimeupdate event to the audio element, and execute a function if the current playback position has changed
myAudio.ontimeupdate = function () {
    myFunction()
};


function secondsToMs(d) {
    d = Number(d);

    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    return ('0' + m).slice(-2) + ":" + ('0' + s).slice(-2);
}

function setSeek(val) {
    myAudio.currentTime = val;
}

function myFunction() {
    // Display the current position of the audio in a p element with id="demo"
    document.getElementById("position").innerHTML = secondsToMs(myAudio.currentTime);
    document.getElementById("seekbar").value = myAudio.currentTime;
    document.getElementById("total").innerHTML = secondsToMs(myAudio.duration);
    document.getElementById("seekbar").max = myAudio.duration;
}

</script> -->

<?php require_once(PATH_VIEWS . "footer.php"); ?>