<?php


require_once(PATH_VIEWS."header.php");?>

<h1>Let's upload songs !</h1>
<div class="divider"></div>

<div class="row">
    <div class="col s4">
        <div class="card  red darken-4 ">
            <div class="card-content white-text">
              <span class="card-title">Upload Music !</span>
              <p>Wanna hear new songs ? Just upload one by selecting a song or even an album !</p>
            </div>
            
        </div>
    </div>
    <div class="col s8">
        
    <form method="post" enctype="multipart/form-data">
        
        <div class="row">
        <div class="file-field input-field">
            <div class="btn  red darken-4">
                <span>Select Music</span>
                <input type="file" >
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
        </div>
            
        </div>
        
        <input type="submit" class="waves-effect waves-light btn right  red darken-4">

    </form>
    </div>
    
    
</div>


<?php require_once(PATH_VIEWS."footer.php"); ?>