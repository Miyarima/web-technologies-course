<?php

    include('../config/config.php');

    $title = 'Object';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/object.php');
?>

<main class="main">
    <header>
        <h1><?=$objectTitle?></h1>
        <p class="about_date">Ägare: <?=$objectOwner?></p>
    </header>
    <div class="object_btns">
        <a class="gallery_btn" href="object.php?object=<?=$last?>">Föregående</a>
        <a class="gallery_btn" href="object.php?object=<?=$next?>">Nästa</a>
    </div>
    <p class="object_img">
        <img class="object_img" src="img/full-size/<?=$image?>" alt="<?=$objectTitle?>">
    </p>
    <p> <?= $objectText ?> </p>
</main>

<?php include('../view/footer.php') ?>