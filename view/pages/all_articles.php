<?php

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = getAllArticles();

$satment = $db->prepare($sql);
$satment->execute();
$result = $satment->fetchAll();
