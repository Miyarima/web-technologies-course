<?php

    include('../config/config.php');

    $title = 'About';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/about.php');
?>

<main class="main">
    <?php if ($category === "about") : ?>
        <header>
            <h1 class="page_title">
                <?= $articleTitle ?>
            </h1>
            <p class="about_date">
                <?= $pubdate ?>
            </p>
        </header>
        <div class="about">
            <?= $aboutContent ?>
        </div>
        <a href="doc.php">DOC</a>
    <?php else : ?>
        <p>
            Kunde inte hitta Artikeln.
        </p>
    <?php endif; ?>

</main>

<?php include('../view/footer.php') ?>