<?php

include("../config/config.php");

$title = $_POST["title"] ?? null;
$check = $_POST["check"] ?? false;
$doit = $_POST["doit"] ?? "";

$success = $title && $check && $doit;

if (!checkIfUserIsAdmin()) {
    $_SESSION["flash-message"] = "Du har inte rätt rättigheter.";
    redirectTo("login.php");
} else if ($check === false) {
    $_SESSION["flash-message"] = "Du måste godkänna.";
    redirectTo("all_objects.php");
} else if ($success) {
    $dsn = getDsn("bmo.sqlite");
    $db = connectToDatabase($dsn);

    $sql = <<<EOD
    DELETE FROM object
    WHERE
        title = ?
    ;
    EOD;

    $stmt = $db->prepare($sql);

    $args = [$title];
    $stmt->execute($args);

    $_SESSION["flash-message"] = "Objektet har blivit borttaget.";
    redirectTo("all_objects.php");
}
