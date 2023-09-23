<?php

    include('../config/config.php');

    $title = 'Articles';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/all_articles.php');
    include('../src/article.php');

    $flashMessage = getFlashMessage();
?>

<main class="main">
    <?php if ($flashMessage) : ?>
        <div class="right_login"><?= $flashMessage ?></div>
    <?php endif; ?>
    <header>
        <h1 class="page_title">
            Alla Artiklar
        </h1>
        <?php if (checkIfUserIsAdmin()) : ?>
            <div class="article_btns">
                <a class="article_btn" href="create_article.php">Lägg till ny Artikel</a>
                <a class="article_btn" href="update_article.php">Uppdatera Artikel</a>
                <a class="article_btn" href="delete_article.php">Ta bort Artikel</a>
            </div>
        <?php endif; ?>
    </header>
    <?php foreach ($result as $article) : ?>
        <?php if ($article["category"] !== "about") : ?>
            <h2 class="article_link">
                <a class="article_link" href="article.php?article=<?= $article["id"] ?>" ><?= $article["title"] ?></a>
            </h2>
            <p class="article_link_p">
                <?= $article["author"] ?> <?= " " ?> <?= $article["pubdate"] ?>
            </p>
            <p>
                <?php if ($article["category"] !== "maggy") : ?>
                    <?= getContentShort($article["content"]) ?>
                <?php else : ?>
                    <?= getContentMaggy($article["content"]) ?>
                <?php endif; ?>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>
</main>

<?php include('../view/footer.php') ?>