<?php

include("../config/config.php");

$user = $_POST["acronym"] ?? "";
$password = $_POST["password"] ?? "";

$dsn = getDsn("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
SELECT
    password
FROM users
WHERE
    acronym = ?
;
EOD;

$stmt = $db->prepare($sql);

$args = [$user];
$stmt->execute($args);

$res = $stmt->fetch();

$hash = $res["password"];
$success = password_verify($password, $hash);

if ($success) {
    $_SESSION["user"] = $user;
    $_SESSION["flash-message"] = "Du har loggat in som $user.";
    redirectTo("home.php");
} else {
    $_SESSION["flash-message"] = "Antingen matchar inte lösnorder eller användaren.";
    redirectTo("login.php");
}
