<nav class="navbar navbar-expand-lg navbar-light bg-light shadow  sticky-top" id="navi1">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" id="logo-style"><img src="../images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link <?= $home ?>" href="../webpages/index.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?= $courses ?>" href="../webpages/courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $settings ?>" href="../webpages/setting-account.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $account ?>" href="../webpages/user-dashboard.php">Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>