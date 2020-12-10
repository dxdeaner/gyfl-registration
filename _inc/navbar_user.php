<!--Navbar-->
<ul class="nav nav-pills justify-content-end">
    <li class="nav-item">
        <a class="nav-link active" href="/">Home</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">League</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="/user-list.php">Leagues</a>
            <a class="dropdown-item" href="#">Teams</a>
            <a class="dropdown-item" href="#">Referees</a>
            <a class="dropdown-item" href="#">Coaches</a>
            <a class="dropdown-item" href="#">Players</a>
            <a class="dropdown-item" href="#">Parents</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Create A League</a>
            <a class="dropdown-item" href="/user-list.php">Inventory</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
                <?php echo $_SESSION['firstname'] ? $_SESSION['firstname'] : 'My Account'; ?>
                <?php echo $_SESSION['lastname'] ? $_SESSION['lastname'] : ''; ?>
            </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Player(s)</a>
            <a class="dropdown-item" href="#">Team(s)</a>
            <a class="dropdown-item" href="/user/index.php">Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout.php">Logout</a>
        </div>
    </li>
</ul>
