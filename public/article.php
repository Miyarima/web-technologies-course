<?php

    include('../config/config.php');

    $title = 'Article';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/article.php');
?>

<main class="main">
    <?php if ($category !== "about") : ?>
        <?php if ($category === "article" or $category === "maggy") : ?>
            <header>
                <h1>
                    <?= $articleTitle ?>
                </h1>
                <p class="about_date">
                    <?= $author ?> <?= " " ?> <?= $pubdate ?>
                </p>
            </header>
            <div class="article_content">
                <?= $articleContent ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <p class="error">Error 404. Sidan kunde inte hittas</p>
        <a class="error_link" href="all_articles.php">Alla Artiklar</a>
    <?php endif; ?>
</main>

<?php include('../view/footer.php') ?>