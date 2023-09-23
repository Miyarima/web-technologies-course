<?php
    include('../config/config.php');
    $title = 'Home';
    include('../view/header.php');
    include('../view/navbar.php');
    include('../view/pages/home.php');
    include('../view/pages/all_articles.php');
    include('../src/article.php');
    $flashMessage = getFlashMessage();
?>

<main class="main">
    <?php if ($flashMessage) : ?>
        <div class="right_login"><?= $flashMessage ?></div>
    <?php endif; ?>
    <header>
        <h1 class="page_title">Begravningsmuseum Online</h1>
    </header>
    <p class="page_intro">
        <?= getContentLong($result[3]["content"]) ?>
    </p>
    
    <h2 class="page_h2"><a class="article_link" href="all_articles.php">Artiklar</a></h2>
    <div class="article_container">
        <img class="homepage_img" src="img/250x250/begravningskonfekt_svart_tro_hopp_karlekx2.jpg" alt="begravningskonfekt_svart_tro_hopp_karlekx2">
        <article class="article_content">
            <h3><a href="article.php?article=1">Begravningskonfekt</a></h3>
            <p>
                <?= getContentMedium($result[0]["content"]) ?>
            </p>
        </article>
    </div>
    <div class="article_container">
        <img class="homepage_img" src="img/250x250/minnestavla_anna_persson.jpg" alt="minnestavla_anna_persson">
        <article class="article_content">
            <h3><a href="article.php?article=2">Minnestavlor</a></h3>
            <p>
                <?= getContentMedium($result[1]["content"]) ?>
            </p>
        </article>
    </div>
    <div class="article_container">
        <img class="homepage_img" src="img/250x250/parlkrans_blomma.jpg" alt="parlkrans_blomma" >
        <article class="article_content">
            <h3><a href="article.php?article=3">Pärlkransar</a></h3>
            <p>
                <?= getContentMedium($result[2]["content"]) ?>
            </p>
        </article>
    </div>
    <div class="article_container">
        <img class="homepage_img" src="img/250x250/minnestavla_anna_persson.jpg" alt="minnestavla_anna_persson">
        <article class="article_content">
            <h3><a href="article.php?article=5">Begravningsfest</a></h3>
            <p>
                <?= getContentMedium($result[4]["content"]) ?>
            </p>
        </article>
    </div>
    <h2 class="page_h2"><a class="article_link" href="all_objects.php">Objekt</a></h2>
    <div class="home_gallery">
        <?php foreach ($objects as $object => $imgPath) : ?>
            <img class="homepage_img" src="<?= $imgPath ?>" title="<?= $object ?>" alt="<?= $imgPath ?>">
        <?php endforeach; ?>
    </div>
</main>

<?php include('../view/footer.php') ?>