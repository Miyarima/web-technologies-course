<?php

if (!checkIfUserIsAdmin()) {
    $_SESSION["flash-message"] = "You don't have the correct privilege.";
    redirectTo("login.php");
}

?>

<main class="main">
    <form class="update_form" method="post" action="update_object_process.php">
        <fieldset>
            <p>
                <label>Objekt Id:<br>
                    <input class="search_field" type="text" name="id">
                </label>
            </p>
            <p>
                <label>Kategori:<br>
                    <input class="search_field" type="text" name="category">
                </label>
            </p>
            <p>
                <label>Title:<br>
                    <input class="search_field" type="text" name="title">
                </label>
            </p>
            <p>
                <label>Innehåll:<br>
                    <textarea class="textarea" type="range" name="content" placeholder="Text...."></textarea>
                </label>
            </p>
            <p>
                <label>Bild:<br>
                    <input class="search_field" type="text" name="image">
                </label>
            </p>
            <p>
                <label>Ägare:<br>
                    <input class="search_field" type="text" name="owner">
                </label>
            </p>
    
            <p>
                <input class="article_btn" type="submit" name="doit" value="Updatera Objekt">
            </p>
        </fieldset>
    </form>
</main>