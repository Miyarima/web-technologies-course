<?php

$search = $_GET["search"] ?? null;
$doit = $_GET["doit"] ?? null;

if ($search || $doit) {
    $dsn = getDsn("bmo.sqlite");
    $db = connectToDatabase($dsn);

    $tables = [
        "Article",
        "Object",
    ];

    $args = [$search];
    $res = [];

    foreach ($tables as $table) {
        $sql = getSearchResult($table);
        $stmt = $db->prepare($sql);
        $stmt->execute($args);
        $res[] = $stmt->fetchAll();
    }

    $printSearch = "";
    if (!$res[0] and !$res[1]) {
        $printSearch .= "Kunde inte hitta något om $search i databasen";
    } else {
        for ($j = 0; $j < count($res[0]); $j++) {
            $idToLink = $res[0][$j]["id"];
            $nameToLink = $res[0][$j]["title"];

            $printSearch .= "<div class='search_result'>";
            $printSearch .= "<span class='mini_link'>Artikel:</span><br>";
            $printSearch .= "<a class='linksearch' href='article.php?article=$idToLink'> $nameToLink</a><br>";
            $printSearch .= "</div>";
        }
        for ($j = 0; $j < count($res[1]); $j++) {
            $idToLink = $res[1][$j]["id"];
            $nameToLink = $res[1][$j]["title"];

            $printSearch .= "<div class='search_result'>";
            $printSearch .= "<span class='mini_link'>Objekt:</span><br>";
            $printSearch .= "<a class='linksearch' href='object.php?object=$idToLink'> $nameToLink</a><br>";
            $printSearch .= "</div>";
        }
    }
}
