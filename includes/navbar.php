<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Kraeken</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zenders.php">Zenders</a>
            </li>
            <?php
                if(isset($_SESSION['loggedin'])) {
                    echo "<li class=nav-item'>
                        <a class='nav-link' href='#'>Nummers</a>
                        </li>";
                }
                if(isset($_SESSION['username']) == 'ljansen') {
                     echo "<li class=nav-item'>
                        <a class='nav-link' href='medewerkers.php'>Medewerkers</a>
                        </li>";
                }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['loggedin'])) {
        echo "<div class='nav navbar-nav navbar-right'>
        <a class='btn btn-primary' href='logout.php'>Log out<span class='sr-only'>(current)</span></a>
    </div>";
    } else {
        echo "<div class='nav navbar-nav navbar-right'>
        <a class='btn btn-primary' href='login.php'>Log in<span class='sr-only'>(current)</span></a>
    </div>";
    }
    ?>
</nav>