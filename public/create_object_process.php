<?php

include("../config/config.php");

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

$sql = <<<EOD
INSERT INTO object
    (category, title, text, image, owner)
VALUES
    (?, ?, ?, ?, ?)
;
EOD;

$stmt = $db->prepare($sql);

$args = [$category, $title, $content, $image, $owner];
$stmt->execute($args);

$_SESSION["flash-message"] = "Objektet har skapats.";
redirectTo("all_objects.php");
