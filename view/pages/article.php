<?php

$articleID = $_GET['article'] ?? null;

if (!$articleID) {
    die("Kunde inte hitta sidan. Error 404.");
} else {
    $dsn = getDsn("bmo.sqlite");
    $db = connectToDatabase($dsn);

    $sql = getArticle();

    $satment = $db->prepare($sql);
    $args = [$articleID];
    $satment->execute($args);
    $result = $satment->fetch();


    $category = htmlentities($result["category"] ?? "");
    $articleTitle = htmlentities($result["title"] ?? "");
    $articleContent = $result["content"] ?? "";
    $author = htmlentities($result["author"] ?? "");
    $pubdate = htmlentities($result["pubdate"] ?? "");
}
