<?php

$objectID = $_GET['object'] ?? null;

if (!$objectID) {
    die("Kunde inte hitta sidan. Error 404.");
} else {
    $objectMax = objectMax();

    if ((int)$objectID - 1 >= 1) {
        $last = (int)$objectID - 1;
    } else {
        $last = 1;
    }

    if ((int)$objectID === $objectMax["MAX(id)"]) {
        $next = $objectMax["MAX(id)"];
    } else {
        $next = (int)$objectID + 1;
    }

    $dsn = getDsn("bmo.sqlite");
    $db = connectToDatabase($dsn);

    $sql = getObject();

    $satment = $db->prepare($sql);
    $args = [$objectID];
    $satment->execute($args);
    $result = $satment->fetch();

    $id = htmlentities($result["id"]);
    $objectTitle = htmlentities($result["title"]);
    $objectCategory = htmlentities($result["category"]);
    $objectText = $result["text"];
    $image = htmlentities($result["image"]);
    $objectOwner = htmlentities($result["owner"]);
}
