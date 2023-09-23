<?php

    include('../config/config.php');

    $title = 'Gallery';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/gallery.php');
?>

<main class="main">
    <header>
        <h1 class="page_title">Galleri</h1>
    </header>
    <div class="gallery_btns">
        <a class="gallery_btn" href="gallery.php?gallery=<?=$last?>">Föregående</a>
        <a class="gallery_btn" href="gallery.php?gallery=<?=$next?>">Nästa</a>
    </div>
    <div class="gallery">
        <?php for ($i = 0; $i < 6; $i++) : ?>
            <?php if (!$imagePaths[$i]) : ?>
                <img class="homepage_img" src="img/250x250/no_image.png">
            <?php else : ?>
                <a href="img/full-size/<?=$imagePaths[$i]["image"]?>">
                    <img class="homepage_img" src="img/250x250/<?=$imagePaths[$i]["image"]?>" alt="<?=$imagePaths[$i]["image"]?>">
                </a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</main>

<?php include('../view/footer.php') ?>
