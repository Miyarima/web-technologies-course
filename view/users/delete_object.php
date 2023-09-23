<?php

if (!checkIfUserIsAdmin()) {
    $_SESSION["flash-message"] = "Du har inte rätt rättigheter.";
    redirectTo("login.php");
}

?>

<main class="main">
    <form class="update_form" method="post" action="delete_object_process.php">
        <fieldset>
            <p>
                <label>Objektets titel:<br>
                    <input class="search_field" type="text" name="title">
                </label>
            </p>
            <p>
                <input type="checkbox" name="check"> Är du säker? <br>
                <input class="article_btn" type="submit" name="doit" value="Ta bort Objekt">
            </p>
        </fieldset>
    </form>
</main>