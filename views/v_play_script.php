<script>
    var myAudio = document.getElementById("myAudio");
    window.onload = function () {
        myFunction()
    };
    function myFunction() {
        document.getElementById("seekbar").max = myAudio.duration;
        document.getElementById("total").innerHTML = secondsToMs(myAudio.duration);
    }

    var myAudio = document.getElementById("myAudio");
    myAudio.play();
    document.getElementById("seekbar").max = myAudio.duration;
    document.getElementById("PausePlay").innerHTML = "pause";
    //myAudio.pause();
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
    };
    
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

    // Get the audio element with id="myAudio"
    var myAudio = document.getElementById("myAudio");
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
</script>