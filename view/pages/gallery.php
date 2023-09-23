<?php

$gallery = $_GET['gallery'] ?? null;

$objectMax = objectMax();

if ((int)$gallery - 1 >= 1) {
    $last = (int)$gallery - 1;
} else {
    $last = 1;
}

if ((int)$gallery * 6 < $objectMax["MAX(id)"]) {
    $next = (int)$gallery + 1;
} else {
    $next = (int)$gallery;
}

$pictures = [];
for ($i = (int)$gallery * 6 - 5; $i <= (int)$gallery * 6; $i++) {
    $pictures[] = $i;
}

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = getImages();

$imagePaths = [];
foreach ($pictures as $pic) {
    $satment = $db->prepare($sql);
    $satment->execute([$pic]);
    $imageArr = $satment->fetch();
    $imagePaths[] = $imageArr;
}
