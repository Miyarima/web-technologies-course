<?php

include("../config/config.php");

$articleId = $_POST["id"] ?? "";
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

updateArticle($db, "category", $category, $articleId);
updateArticle($db, "title", $title, $articleId);
updateArticle($db, "content", $content, $articleId);
updateArticle($db, "author", $author, $articleId);
updateArticle($db, "pubdate", $pubdate, $articleId);

$_SESSION["flash-message"] = "Artiklen har skapats.";
redirectTo("all_articles.php");
