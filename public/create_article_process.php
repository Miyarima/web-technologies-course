<?php

include("../config/config.php");

$articleID = $_POST["id"] ?? "";
$category = $_POST["category"] ?? "";
$title = $_POST["title"] ?? "";
$content = $_POST["content"] ?? "";
$author = $_POST["author"] ?? "";
$pubdate = $_POST["pubdate"] ?? "";

if (!checkIfUserIsAdmin()) {
    $_SESSION["flash-message"] = "You don't have the correct privilege.";
    redirectTo("login.php");
}

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
INSERT INTO article
    (id, category, title, content, author, pubdate)
VALUES
    (?, ?, ?, ?, ?, ?)
;
EOD;

$stmt = $db->prepare($sql);

$args = [$articleID, $category, $title, $content, $author, $pubdate];
$stmt->execute($args);

$_SESSION["flash-message"] = "Artiklen har skapats.";
redirectTo("all_articles.php");
