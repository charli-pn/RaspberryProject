<?php


require_once(PATH_VIEWS."header.php");?>

<h1>Let's upload songs !</h1>
<div class="divider"></div>

<div class="row">
<div class="col s6">
<form method="post" enctype="multipart/form-data">
    
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" label = "Choose a music file">
      </div>
      
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    
    <input type="submit" class="waves-effect waves-light btn right">
    
    
      

</form>
</div>
</div>


<?php require_once(PATH_VIEWS."footer.php"); ?>