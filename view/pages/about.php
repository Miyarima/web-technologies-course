<?php

$articleTitle = "4";

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = getArticle();

$satment = $db->prepare($sql);
$args = [$articleTitle];
$satment->execute($args);
$result = $satment->fetch();

$category = htmlentities($result["category"] ?? "");
$articleTitle = htmlentities($result["title"] ?? "");
$aboutContent = $result["content"] ?? "";
$author = htmlentities($result["author"] ?? "");
$pubdate = htmlentities($result["pubdate"] ?? "");
