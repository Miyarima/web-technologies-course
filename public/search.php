<?php

    include('../config/config.php');

    $title = 'Object';

    include('../view/header.php');

    include('../view/navbar.php');

    include('../view/pages/search.php');
?>

<main class="main">
    <header>
        <h1 class="page_title">
            Sök
        </h1>
    </header>
        <form class="search_form">
            <fieldset>
                <p>
                    <input class="search_field" type="search" name="search">
                </p>
                <p>
                    <input class="search_btn" type="submit" name="doit" value="search">
                </p>
            </fieldset>
        </form>
        <?php if ($_GET) : ?>
            <?= $printSearch ?>
        <?php endif; ?>
</main>

<?php include('../view/footer.php') ?>