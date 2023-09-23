<?php

include("../config/config.php");

$objectID = $_POST["id"] ?? "";
$category = $_POST["category"] ?? "";
$title = $_POST["title"] ?? "";
$content = $_POST["content"] ?? "";
$image = $_POST["image"] ?? "";
$owner = $_POST["owner"] ?? "";

if (!checkIfUserIsAdmin()) {
    $_SESSION["flash-message"] = "You don't have the correct privilege.";
    redirectTo("login.php");
}

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

updateObject($db, "category", $category, $objectID);
updateObject($db, "title", $title, $objectID);
updateObject($db, "text", $content, $objectID);
updateObject($db, "image", $image, $objectID);
updateObject($db, "owner", $owner, $objectID);

$_SESSION["flash-message"] = "Artiklen har skapats.";
redirectTo("all_objects.php");
