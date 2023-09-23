<?php

$flashMessage = getFlashMessage();

?>

<main class="main">
    <h2 class="page_title">Login</h2>
    <form class="login_form" method="post" action="login_process.php">
        <?php if ($flashMessage) : ?>
            <div class="wrong_login"><?= $flashMessage ?></div>
        <?php endif; ?>
        <fieldset>
            <p>
                <label>Acronym:
                    <input class="search_field" type="text" name="acronym" placeholder="Enter your acronym">
                </label>
            </p>
    
            <p>
                <label>Password:
                    <input class="search_field" type="password" name="password" placeholder="Enter the password">
                </label>
            </p>

            <p>
                <input class="gallery_btn" type="submit" name="Login" value="Login">
            </p>
        </fieldset>
    </form>
</main>