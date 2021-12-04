<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggle" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand h1" href="<?= site_url("$role") ?>">Facilebooker</a>

    <div class="collapse navbar-collapse" id="toggle">
        <ul class="navbar-nav mr-auto">
            <?php if($role == "admin"): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url("admin/users") ?>">Users<span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url("$role/facilities") ?>">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url("$role/requests") ?>">Requests</a>
            </li>
        </ul>
        <div class="navbar nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-normal" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $role ?>, <?= $username ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= site_url('logout') ?>">Logout</a>
                </div>
            </li>
        </div>
    </div>
</nav>
</header>