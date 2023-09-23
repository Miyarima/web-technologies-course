<?php

    include('../config/config.php');

    $title = 'Objects';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/all_objects.php');
    include('../src/article.php');

    $flashMessage = getFlashMessage();
?>

<main class="main">
    <?php if ($flashMessage) : ?>
        <div class="right_login"><?= $flashMessage ?></div>
    <?php endif; ?>
    <header>
        <h1 class="page_title">
            Alla Objekt
        </h1>
        <?php if (checkIfUserIsAdmin()) : ?>
            <div class="article_btns">
                <a class="article_btn" href="create_object.php">Lägg till nytt Objekt</a>
                <a class="article_btn" href="update_object.php">Uppdatera Objekt</a>
                <a class="article_btn" href="delete_object.php">Ta bort Objekt</a>
            </div>
        <?php endif; ?>
    </header>
    <div class="home_gallery">
        <?php foreach ($result as $object) : ?>
            <div>
            <h2 class="object_link">
                <a class="object_link" href="object.php?object=<?= $object["id"] ?>" ><?= $object["category"] ?></a>
            </h2>
            <p class="object_img">
                <a class="object_link" href="object.php?object=<?= $object["id"] ?>" >
                    <img class="homepage_img" src="img/250x250/<?= $object["image"] ?>" alt="<?=$object["title"]?>">
                </a>
            </p>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include('../view/footer.php') ?>