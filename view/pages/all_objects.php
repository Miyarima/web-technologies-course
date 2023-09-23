<?php

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = getAllObjects();

$satment = $db->prepare($sql);
$satment->execute();
$result = $satment->fetchAll();
