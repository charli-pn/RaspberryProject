<nav class="red" role="navigation nav-extended">
    <div class="nav-wrapper container">
        <a id="logo-container" href="index.php" class="brand-logo">KyaPlay</a>
        <ul class="right hide-on-med-and-down">
            <li <?= ($page=='welcome') ? 'class="active"':'' ?>>
                <a href = "index.php">Your albums</a>
            </li>
            <li <?= ($page=='play') ? 'class="active"':'' ?>>
                <a href = "<?= PLAY_PAGE_ALL ?>">Play Music</a>
            </li>
            <li <?= ($page=='add') ? 'class="active"':'' ?>>
                <a href = "<?= ADD_PAGE ?>">Upload Music</a>
            </li>
        </ul>
        
        <ul id="nav-mobile" class="side-nav">
            <li <?= ($page==='welcome') ? 'class="active"':'' ?>>
                <a href = "index.php">Your albums</a>
            </li>
            <li <?= ($page=='play') ? 'class="active"':'' ?>>
                <a href = "<?= PLAY_PAGE_ALL ?>">Play Music</a>
            </li>
            <li <?= ($page==='add') ? 'class="active"':'' ?>>
                <a href = "<?= ADD_PAGE ?>">Upload Music</a>
            </li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>

</nav>