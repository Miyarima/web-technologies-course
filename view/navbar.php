<?php

    $user = $_SESSION["user"] ?? null;
?>

<body>
    <header>
        <nav class="nav">
            <ul class="nav_bar">
                <li>
                    <p class="bmo">BMO</p>
                </li>
                <li>
                    <a class="<?= $activePage === "home.php" ? "active" : "not_active"?>" href="home.php">Hem</a>
                </li>
                <li>
                    <a class="<?= $activePage === "all_articles.php" ? "active" : "not_active"?>" href="all_articles.php">Artiklar</a>
                </li>
                <li>
                    <a class="<?= $activePage === "all_objects.php" ? "active" : "not_active"?>" href="all_objects.php">Objekt</a>
                </li>
                <li>
                    <a class="<?= $activePage === "gallery.php" ? "active" : "not_active"?>" href="gallery.php?gallery=1">Galleri</a>
                </li>
                <li>
                    <a class="<?= $activePage === "about.php" ? "active" : "not_active"?>" href="about.php">Om</a>
                </li>
                <li>
                    <a class="<?= $activePage === "search.php" ? "active" : "not_active"?>" href="search.php">Sök</a>
                </li>
                <li>
                    <?php if ($user) : ?>
                        <a class="<?= $activePage === "login.php" ? "active" : "not_active"?>" href="logout_process.php">Logga ut | Inloggad som: <?= $user ?></a>
                    <?php else : ?>
                        <a class="<?= $activePage === "login.php" ? "active" : "not_active"?>" href="login.php">Logga in</a>
                    <?php endif; ?>
                </li>
            </ul>  
        </nav>
    </header>