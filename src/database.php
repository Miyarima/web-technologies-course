<?php

/**
 * Exception handler to print out a HTML message with details on the exception,
 * useful to deal with uncaught exceptions.
 *
 * @return object as the database connection object.
 */
function connectToDatabase(string $dsn): object
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>'$dsn'<br>";
        throw $e;
    }

    return $db;
}

/**
 * Create and get the dsn for the database.
 *
 * @return string as the database connection object.
 */
function getDsn(string $dbFile): string
{
    $fileName = "../db/$dbFile";
    if ($_SERVER["SERVER_NAME"] !== "www.student.bth.se") {
        $fileName = "C:\db/$dbFile";
    }
    $dsn = "sqlite:$fileName";
    return $dsn;
}

/**
 * Checks if user is logged in and returns the acronym or redirect to
 * the login page.
 *
 * @return string the user acronym.
 */
function checkIfUserIsAdmin(): bool
{
    $user = $_SESSION["user"] ?? null;

    $dsn = getDsn("bmo.sqlite");
    $db = connectToDatabase($dsn);

    $sql = <<<EOD
    SELECT
        role
    FROM users
    WHERE
        acronym = ?
    ;
    EOD;

    $satment = $db->prepare($sql);
    $args = [$user];
    $satment->execute($args);
    $result = $satment->fetch();

    $role = $result["role"] ?? null;

    if ($role === "admin") {
        return true;
    }
    return false;
}

/**
 * Gets last rowid.
 *
 * @return array
 */
function objectMax(): array
{
    $dsn = getDsn("bmo.sqlite");
    $db = connectToDatabase($dsn);

    $sql = <<<EOD
    SELECT MAX(id) from object;
    EOD;

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

/**
 * This function will return the question for the
 * given table.
 *
 * @return EOD as a question for the database.
 */
function getAllArticles(): string
{
    $sql = <<<EOD
    SELECT
        id,
        category,
        title,
        content,
        author,
        pubdate
    FROM Article
    ;
    EOD;

    return $sql;
}

/**
 * This function will return the question for the
 * given table.
 *
 * @return EOD as a question for the database.
 */
function getArticle(): string
{
    $sql = <<<EOD
    SELECT
        category,
        title,
        content,
        author,
        pubdate
    FROM Article
    WHERE
        id = ?
    ;
    EOD;

    return $sql;
}

/**
 * This function will return the question for the
 * given table.
 *
 * @return EOD as a question for the database.
 */
function getAllObjects(): string
{

    $sql = <<<EOD
    SELECT
        id,
        title,
        category,
        text,
        image,
        owner
    FROM Object
    ;
    EOD;

    return $sql;
}

/**
 * This function will return the question for the
 * given table.
 *
 * @return EOD as a question for the database.
 */
function getObject(): string
{
    $sql = <<<EOD
    SELECT
        id,
        title,
        category,
        text,
        image,
        owner
    FROM Object
    WHERE
        id = ?
    ;
    EOD;

    return $sql;
}

/**
 * This function will return the question for the
 * given table.
 *
 * @return EOD as a question for the database.
 */
function getImages(): string
{
    $sql = <<<EOD
    SELECT
        image
    FROM Object
    WHERE
     id = ?
    ;
    EOD;

    return $sql;
}

/**
 * This function will return the question for the
 * given table.
 *
 * @return EOD as a question for the database.
 */
function getSearchResult($here): string
{
    $sql = <<<EOD
    SELECT
        id,
        title
    FROM $here
    WHERE
        title LIKE ?
    ;
    EOD;

    return $sql;
}

/**
 * Updates the column given in $whatToUpdate in
 * the article table in the database.
 *
 * @return void
 */
function updateArticle(object $db, $whatToUpdate, $theUpdate, $id): void
{
    $sql = <<<EOD
    UPDATE article SET
        $whatToUpdate = ?
    WHERE
        id = ?
    ;
    EOD;

    $stmt = $db->prepare($sql);

    $args = [$theUpdate, $id];
    $stmt->execute($args);
}

/**
 * Updates the column given in $whatToUpdate in
 * the object table in the database.
 *
 * @return void
 */
function updateObject(object $db, $whatToUpdate, $theUpdate, $id): void
{
    $sql = <<<EOD
    UPDATE object SET
        $whatToUpdate = ?
    WHERE
        id = ?
    ;
    EOD;

    $stmt = $db->prepare($sql);

    $args = [$theUpdate, $id];
    $stmt->execute($args);
}
